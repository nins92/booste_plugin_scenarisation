// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Handles the "Add an activity or resource" chooser for the booste third form,
 * plus the recommendations panel and taxonomy chart on that page.
 *
 * @module     local_booste/activity_form
 * @copyright  2020 Mathew May <mathew.solutions>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'core_course/local/activitychooser/repository',
    'core/custom_interaction_events',
    'core/templates',
    'core/modal_factory',
    'core/modal_events',
    'core/str',
    'core/pending',
    'core/ajax',
    'local_booste/helper',
    'core/notification'
], function(Repository, CustomEvents, Templates, ModalFactory, ModalEvents,
    Str, Pending, Ajax, Helper, Notification) {

    // NOTE: no 'jquery' AMD dependency here on purpose. Since Moodle 4.5/5.0, a plugin
    // declaring 'jquery' as a raw AMD dependency (rather than getting it compiled in via
    // an ES-module 'import' by Moodle's own build pipeline) can trigger
    // "amd.exposeJquery is not a function" as soon as the module graph resolves - which
    // then breaks jQuery exposure for the *whole page*, cascading into "$ is not a
    // function" even inside Moodle core's own AMD modules (e.g. core_form/events.js).
    // That in turn silently breaks the Bootstrap-driven chooser modal/tabs, even though
    // the templates and the underlying data are perfectly correct. See community reports
    // of the same regression, e.g. https://github.com/marcusgreen/moodle-qtype_wordselect/issues/56
    const loaderId = 'booste_loader';

    /**
     * Initialise le formulaire avec loader et branche les boutons "Ajouter une activité/ressource".
     *
     * @param {Number} courseId
     * @param {Number} boosteId
     * @param {Object} chooserConfig
     */
    const init = (courseId, boosteId, chooserConfig) => {
        const pendingPromise = new Pending('local_booste/activity_form:init');

        registerListenerEvents(courseId, boosteId, chooserConfig);
        Helper.thirdFormLoader();

        pendingPromise.resolve();
    };

    /**
     * Charger les recommandations et injecter dans le DOM.
     *
     * @param {Number} courseId
     * @param {Number} boosteId
     * @param {String} taxonomy
     * @param {Number} points
     */
    const recommendations = async (courseId, boosteId, taxonomy = "all", points) => {
        showLoader();

        try {
            const data = await fetchModuleData(courseId);
            const extActivities = await fetchExtActivities(courseId);
            const recommended = await fetchRecommendedActivities(boosteId, taxonomy);

            data.content_items.forEach(d => {
                d.activity_type = 'int';
            });
            data.content_items.push(...extActivities);

            const recommendedForTemplate = setRecommendedActivities(data.content_items, recommended, points);
            const params = {
                recommended: recommendedForTemplate,
                taxonomy: taxonomy,
                taxonomy_i18n: M.util.get_string(taxonomy, 'local_booste')
            };

            const idContainer = document.getElementById(taxonomy + "_suggested_activities");

            const {html, js} = await Templates.renderForPromise('local_booste/activitysuggestedlist', params);
            Templates.replaceNodeContents(idContainer, html, js);

            setupShowMoreSuggestions(taxonomy, recommendedForTemplate.length);

        } catch (err) {
            Notification.exception(err);
        } finally {
            hideLoader();
        }
    };

    /**
     * N'affiche que les 10 premières suggestions et ajoute un lien sous le tableau pour
     * afficher/masquer les suivantes.
     *
     * @param {String} taxonomy
     * @param {Number} recommendedCount
     */
    const setupShowMoreSuggestions = async (taxonomy, recommendedCount) => {
        const shownDefault = 10;
        const table = document.getElementById('local-booste-recommended-' + taxonomy);
        if (!table || recommendedCount <= shownDefault) {
            return;
        }

        const moretext = await Str.get_string('more', 'local_booste');
        const lesstext = await Str.get_string('less', 'local_booste');
        const dataRows = table.tBodies[0] ? Array.from(table.tBodies[0].rows) : [];
        if (!dataRows.length) {
            return;
        }

        let numShown = shownDefault;
        dataRows.forEach((row, index) => {
            row.style.display = index < numShown ? '' : 'none';
        });

        const link = document.createElement('a');
        link.href = '#';
        link.id = 'display_recs_' + taxonomy;
        link.textContent = moretext;
        table.insertAdjacentElement('afterend', link);

        link.addEventListener('click', (e) => {
            e.preventDefault();
            if (numShown === dataRows.length) {
                numShown = shownDefault;
                link.textContent = moretext;
            } else {
                numShown = dataRows.length;
                link.textContent = lesstext;
            }
            dataRows.forEach((row, index) => {
                row.style.display = index < numShown ? '' : 'none';
            });
        });
    };

    /**
     * Initialiser le chart des activités.
     *
     * @param {Number} boosteId
     */
    const initChart = async (boosteId) => {
        showLoader();

        try {
            const objectives = await getObjectives(boosteId);
            const chartData = await buildChartData(objectives);
            const {html, js} = await Templates.renderForPromise(
                'local_booste/activitychart',
                {chartdata: JSON.stringify(chartData), withtable: true}
            );
            Templates.replaceNodeContents(document.getElementById('taxonomy_chart'), html, js);
        } catch (err) {
            Notification.exception(err);
        } finally {
            hideLoader();
        }
    };

    /**
     * Affiche le loader.
     */
    const showLoader = () => {
        const el = document.getElementById(loaderId);
        if (el) {
            el.style.display = '';
        }
    };

    /**
     * Cache le loader (fondu simple en CSS plutôt que jQuery fadeOut).
     */
    const hideLoader = () => {
        const el = document.getElementById(loaderId);
        if (!el) {
            return;
        }
        el.style.transition = 'opacity 0.2s ease';
        el.style.opacity = '0';
        window.setTimeout(() => {
            el.style.display = 'none';
            el.style.opacity = '';
            el.style.transition = '';
        }, 200);
    };

    /**
     * Récupère l'archetype de chaque module d'activité installé, calculé côté serveur
     * avec plugin_supports() (API stable), plutôt que de dépendre du champ "archetype"
     * renvoyé par le repository cœur de Moodle (peu fiable / changeant selon les versions).
     *
     * @return {Promise}
     */
    const fetchModuleArchetypes = () => {
        return Ajax.call([{methodname: 'local_booste_get_module_archetypes', args: {}}])[0];
    };

    /**
     * Récupère les modules Moodle via le repository cœur du sélecteur d'activités.
     *
     * @param {Number} courseId
     * @return {Promise}
     */
    const fetchModuleData = (courseId) => {
        return Repository.activityModules(courseId);
    };

    /**
     * Récupère les activités externes via Ajax.
     *
     * @param {Number} courseId
     * @return {Promise}
     */
    const fetchExtActivities = (courseId) => {
        return Ajax.call([{methodname: 'local_booste_get_ext_activities', args: {id: courseId}}])[0];
    };

    /**
     * Récupère les activités recommandées via Ajax.
     *
     * @param {Number} boosteId
     * @param {String} taxonomy
     * @return {Promise}
     */
    const fetchRecommendedActivities = (boosteId, taxonomy) => {
        return Ajax.call([{methodname: 'local_booste_get_recommendations', args: {id: boosteId, taxonomy: taxonomy}}])[0];
    };

    /**
     * Récupère les objectifs via Ajax.
     *
     * @param {Number} boosteId
     * @return {Promise}
     */
    const getObjectives = (boosteId) => {
        return Ajax.call([{methodname: 'local_booste_get_objectives', args: {id: boosteId}}])[0];
    };

    /**
     * Transforme les données pour le template recommandé.
     *
     * @param {Array} data
     * @param {Array} context
     * @param {Number} points
     * @return {Array}
     */
    const setRecommendedActivities = (data, context, points) => {
        const recActivities = [];
        const extRecActivities = [];

        context.forEach(rec => {
            if (rec.ext_activity) {
                extRecActivities[rec.ext_activity] = rec.points;
            } else if (rec.activity) {
                recActivities[rec.activity] = rec.points;
            }
        });

        const extRecActivitiesKeys = Object.keys(extRecActivities);
        const recActivitiesKeys = Object.keys(recActivities);

        data.forEach(row => {
            row.recommended = false;
            row.recommended_value = 0;
            row.match = 0;

            if (row.activity_type === 'ext' && extRecActivitiesKeys.includes(row.id.toString())) {
                row.recommended = true;
                row.recommended_value = parseInt(extRecActivities[row.id] + 10);
            } else if (row.activity_type === 'int' && recActivitiesKeys.includes(row.id.toString())) {
                row.recommended = true;
                row.recommended_value = parseInt(recActivities[row.id] + 10);
            }
            row.match = Math.ceil(row.recommended_value / points * 100);
        });

        let recommended = data.filter(mod => mod.recommended === true);
        recommended = recommended.sort((a, b) => b.recommended_value - a.recommended_value);
        let index = 1;
        recommended.forEach(row => {
            row.index = index++;
        });

        return recommended;
    };

    /**
     * Construit les données pour le chart, avec les libellés traduits (fichiers de langue
     * local_booste), plutôt que d'utiliser directement les clés anglaises de taxonomie
     * ('knowledge', 'comprehension', ...) comme libellés affichés.
     *
     * @param {Array} objectives
     * @return {Promise<Object>}
     */
    const buildChartData = async (objectives) => {
        const taxonomyOrder = ['knowledge', 'comprehension', 'application', 'analysis', 'evaluation', 'synthesis'];
        const values = taxonomyOrder.map(t => objectives.filter(o => o.taxonomy_name === t).length);
        const colors = [
            "rgb(240, 207, 78)", "rgb(140, 93, 217)", "rgb(255, 140, 63)",
            "rgb(175, 220, 253)", "rgb(202, 49, 32)", "rgb(204, 190, 170)"
        ];

        const labels = await Promise.all(taxonomyOrder.map(t => Str.get_string(t, 'local_booste')));
        const title = await Str.get_string('taxonomy_chart', 'local_booste');
        const objectivesLabel = await Str.get_string('objectives_number', 'local_booste');

        // core/chart_builder expects the full chart_base/chart_series JSON shape
        // (the same shape \core\chart_base::jsonSerialize() produces server-side).
        // Leaving out axes/config_colorset/doughnut at the top level, or
        // type/axes/smooth on the series, makes Builder.make() throw while
        // parsing the data, which silently kills the chart with no visible error.
        return {
            type: "pie",
            series: [{
                label: objectivesLabel,
                labels: labels,
                values: values,
                colors: colors,
                type: null,
                axes: {x: null, y: null},
                smooth: null
            }],
            labels: labels,
            title: title,
            axes: {x: [], y: []},
            config_colorset: null,
            doughnut: false
        };
    };

    /**
     * Ajoute un bloc/label "consigne" dans une section.
     */
    const createGuideline = () => {
        document.querySelectorAll('[data-action=add_guideline]').forEach(selector => {
            selector.addEventListener('click', e => {
                const data = e.target.dataset;
                const urlParams = new URLSearchParams(window.location.search);
                const boosteid = urlParams.get('booste');
                const courseid = urlParams.get('course');

                let url = window.location.href;
                url = url.split('booste_third_form')[0];
                url += 'modedit.php?&course=' + courseid + '&add=label&booste=' + boosteid +
                    '&booste_step=' + data.id + '&section=' + data.sectionid + '&sr=&archetype=1';
                window.location.href = url;
            });
        });
    };

    /**
     * Construit et affiche la modale "Ajouter une activité ou ressource".
     *
     * @param {Promise} bodyPromise
     * @param {Object} footer
     * @return {Promise}
     */
    const buildModal = (bodyPromise, footer) => {
        return ModalFactory.create({
            type: ModalFactory.types.DEFAULT,
            title: Str.get_string('addresourceoractivity'),
            body: bodyPromise,
            footer: footer.customfootertemplate,
            large: true,
            scrollable: false,
            templateContext: {classes: 'modchooser'}
        }).then(modal => {
            modal.show();
            return modal;
        });
    };

    /**
     * Wire tab switching for the "Add an activity or resource" chooser modal ourselves,
     * without relying on Bootstrap's data-toggle/data-bs-toggle behaviour (which differs
     * between Bootstrap 4 and 5, and isn't wired at all for HTML injected manually into a
     * modal body). Scoped to the modal root so it never interferes with other tabs on the
     * page.
     *
     * @param {HTMLElement} modalRoot
     */
    const initChooserTabs = (modalRoot) => {
        const tabLinks = modalRoot.querySelectorAll(
            '[data-region="activity-tab-nav"], [data-region="resource-tab-nav"], ' +
            '[data-region="ext-activity-tab-nav"], [data-region="recommended-tab-nav"]'
        );

        tabLinks.forEach(tabLink => {
            tabLink.addEventListener('click', (e) => {
                e.preventDefault();

                const targetId = tabLink.getAttribute('href');
                if (!targetId || !targetId.startsWith('#')) {
                    return;
                }
                const targetPane = modalRoot.querySelector(targetId);
                if (!targetPane) {
                    return;
                }

                const nav = tabLink.closest('[role="tablist"]');
                const tabContent = targetPane.parentElement;

                if (nav) {
                    nav.querySelectorAll('.nav-link').forEach(link => {
                        link.classList.remove('active');
                        link.setAttribute('aria-selected', 'false');
                        link.setAttribute('tabindex', '-1');
                    });
                }
                if (tabContent) {
                    tabContent.querySelectorAll('.tab-pane').forEach(pane => {
                        pane.classList.remove('active', 'show');
                    });
                }

                tabLink.classList.add('active');
                tabLink.setAttribute('aria-selected', 'true');
                tabLink.setAttribute('tabindex', '0');
                targetPane.classList.add('active', 'show');
            });
        });
    };

    /**
     * Enregistre les écouteurs des boutons "Ajouter une activité" / "Ajouter une ressource".
     *
     * @param {Number} courseId
     * @param {Number} boosteId
     * @param {Object} chooserConfig
     */
    const registerListenerEvents = (courseId, boosteId, chooserConfig) => {
        const events = [
            'click',
            CustomEvents.events.activate,
            CustomEvents.events.keyboardActivate
        ];

        CustomEvents.define(document, events);

        events.forEach(event => {
            document.addEventListener(event, async(e) => {
                const action = e.target.dataset.action;
                if (action !== 'add_activity' && action !== 'add_resource') {
                    return;
                }

                const caller = e.target;
                let bodyPromiseResolver;
                const bodyPromise = new Promise(resolve => {
                    bodyPromiseResolver = resolve;
                });

                try {
                    const footerData = await fetchFooterData(courseId, caller.dataset.sectionid);
                    const modal = await buildModal(bodyPromise, footerData);

                    // ModalFactory.create() above only waits for the modal shell itself to
                    // be ready, not for `bodyPromise` (resolved further down, once the
                    // chooser HTML has been built) to actually be injected into the DOM -
                    // that injection happens asynchronously, on modal's own body promise
                    // chain. Wiring the tabs immediately after resolving bodyPromise (as
                    // this used to do) ran before that injection completed, so
                    // querySelectorAll found no tab links yet and no click handlers were
                    // ever attached - except for the tab that's active by default, which
                    // needs no click. Listening for bodyRendered guarantees the markup is
                    // actually in the DOM before we wire it up.
                    const modalRoot = modal.getRoot ? modal.getRoot()[0] : null;
                    if (modalRoot) {
                        modal.getRoot().on(ModalEvents.bodyRendered, () => {
                            initChooserTabs(modalRoot);
                        });
                    }

                    const data = await fetchModuleData(courseId);
                    const extActivities = await fetchExtActivities(courseId);
                    const moduleArchetypes = await fetchModuleArchetypes();
                    const archetypeByName = {};
                    moduleArchetypes.forEach(m => {
                        archetypeByName[m.name] = m.archetype;
                    });
                    extActivities.forEach(ea => {
                        ea.link_helper = ea.link;
                    });
                    data.content_items.forEach(d => {
                        d.activity_type = 'int';
                        // Prefer our own server-computed archetype (plugin_supports(), stable
                        // across Moodle versions) over whatever the core repository sent, since
                        // the latter has proven unreliable and left the "resources" tab empty.
                        if (Object.prototype.hasOwnProperty.call(archetypeByName, d.name)) {
                            d.archetype = archetypeByName[d.name];
                        }
                    });
                    data.content_items.push(...extActivities);

                    const recommended = await fetchRecommendedActivities(boosteId, 'all');
                    setRecommendedActivities(data.content_items, recommended, 1);

                    const builtModuleData = sectionIdMapper(
                        data, boosteId, caller.dataset.id, caller.dataset.sectionid,
                        caller.dataset.sectionreturnid, courseId
                    );

                    const templateName = action === 'add_activity' ?
                        'local_booste/activitychooser' : 'local_booste/resourcechooser';
                    const {html, js} = await Templates.renderForPromise(
                        templateName,
                        templateDataBuilder(builtModuleData, chooserConfig)
                    );

                    bodyPromiseResolver(html);
                    Templates.runTemplateJS(js);
                } catch (err) {
                    // If anything above throws, the modal is already visible and its body
                    // promise is still pending: without resolving it here, the chooser is
                    // stuck showing an empty box forever with no visible feedback. Resolve
                    // with an error message so the failure is at least visible, in addition
                    // to the usual notification.
                    bodyPromiseResolver(
                        '<div class="alert alert-danger m-3">' +
                        (err && err.message ? err.message : String(err)) +
                        '</div>'
                    );
                    Notification.exception(err);
                }
            });
        });
    };

    /**
     * Récupère les données du pied de la modale.
     *
     * @param {Number} courseId
     * @param {Number} sectionId
     * @return {Promise}
     */
    const fetchFooterData = (courseId, sectionId) => {
        return Repository.fetchFooterData(courseId, sectionId);
    };

    /**
     * Adapte les liens des modules pour pointer vers les formulaires booste.
     *
     * @param {Object} webServiceData
     * @param {Number} boosteId
     * @param {Number} boosteStep
     * @param {Number} id
     * @param {Number} sectionreturnid
     * @param {Number} courseId
     * @return {Array}
     */
    const sectionIdMapper = (webServiceData, boosteId, boosteStep, id, sectionreturnid, courseId) => {
        const newData = JSON.parse(JSON.stringify(webServiceData));
        newData.content_items.forEach(module => {
            if (module.activity_type === 'int') {
                module.link = module.link.replace('id=', 'course=');
                if (module.componentname === 'mod_game') {
                    module.link = module.link.replace('course/mod', 'local/booste/forms/mod');
                } else {
                    module.link = module.link.replace('course/mod', 'local/booste/forms/modedit');
                }
                module.link += '&booste=' + boosteId + '&booste_step=' + boosteStep +
                    '&section=' + id + '&sr=' + (sectionreturnid ?? 0) + '&archetype=' + module.archetype;
            } else if (module.activity_type === 'ext') {
                const link = window.location.href.split('forms/');
                module.link = link[0] + 'forms/modedit.php';
                module.link += '?course=' + courseId + '&add=url&booste=' + boosteId + '&booste_step=' + boosteStep +
                    '&section=' + id + '&sr=' + (sectionreturnid ?? 0) + '&archetype=' + module.archetype +
                    '&ext_activity=' + module.id;
            }
        });
        return newData.content_items;
    };

    /**
     * Construit le contexte du template du chooser (onglets activités/ressources/favoris).
     *
     * @param {Array} data
     * @param {Object} chooserConfig
     * @return {Object}
     */
    const templateDataBuilder = (data, chooserConfig) => {
        // NOTE: chooserConfig.tabmode used to mirror core's numeric
        // "activitychoosertabmode" setting (0/1/2) to decide whether to
        // populate the activities/resources tabs at all. Since Moodle 4.4
        // (MDL-70226) that core setting no longer stores a plain integer -
        // it stores a list of enabled tabs (e.g. "Starred, Recommended,
        // All, Activities, Resources"), serialised as a comma-separated
        // list of identifiers such as "1,2,4,0,3". parseInt() on that
        // string silently returns whichever leading number happens to be
        // first (here 1), which is neither 0 nor 2, so the branch that
        // filled "activities"/"resources" was skipped entirely and both
        // panes rendered empty - with no error, since every promise still
        // resolved correctly.
        //
        // local_booste's own chooser doesn't have core's multi-tab concept
        // to begin with: /activitychooser and /resourcechooser are two
        // separate templates picked by which button ("Ajouter une
        // activité" vs "Ajouter une ressource") the user clicked, so there
        // is nothing to gate here - always populate both lists.
        // Exclude resources (archetype 1: Fichier, Dossier, Page, URL, ...) from the
        // "Activités" tab of the add-activity chooser - those belong only under the
        // separate "Ajouter une ressource" button/dialog (see `resources` below, which
        // resourcechooser.mustache uses and which stays untouched).
        const activities = data.filter(mod => mod.activity_type === 'int' && mod.archetype !== 1);
        const extActivities = data.filter(mod => mod.activity_type === 'ext');
        const resources = data.filter(mod => mod.archetype === 1);
        const showActivities = true;
        const showResources = true;
        const showAll = true;
        const favourites = data.filter(mod => mod.favourite === true);
        const recommended = data.filter(mod => mod.recommended === true);

        const favouritesFirst = !!favourites.length;

        // NOTE: local_booste/activitychooser and resourcechooser do not render a
        // favourites tab/pane, so favouritesFirst must never suppress "active" on
        // both the other tabs below - core_course's registerListenerEvents does
        // body.querySelector(selectors.elements.activetab).getAttribute("href")
        // with no null-check, so if no tab carries the "active" class at all the
        // chooser throws instead of opening. Guarantee exactly one of the two
        // tabs we do render is always active, regardless of favouritesFirst.
        const activitiesFirst = showAll === false;
        const fallback = !activitiesFirst;

        return {
            default: data,
            showAll: showAll,
            activities: activities,
            ext_activities: extActivities,
            showActivities: showActivities,
            activitiesFirst: activitiesFirst,
            resources: resources,
            showResources: showResources,
            favourites: favourites,
            recommended: recommended,
            favouritesFirst: favouritesFirst,
            fallback: fallback
        };
    };

    return {
        init: init,
        recommendations: recommendations,
        initChart: initChart,
        createGuideline: createGuideline
    };
});
