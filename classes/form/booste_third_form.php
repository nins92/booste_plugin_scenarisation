<?php

namespace local_booste\form;

defined('MOODLE_INTERNAL') || die();

use local_booste\helper;

/**
 * Third booste form.
 */
class booste_third_form extends \core\form\persistent {

    /** @var string Persistent class name. */
    protected static $persistentclass = \local_booste\booste::class;

    /** @var array Fields removed before save. */
    protected static $fieldstoremove = array(
        'submitbutton',
        'mform_isexpanded_id_header_suggestions',
        'mform_isexpanded_id_header_tags',
        'mform_isexpanded_id_header_steps'
    );

    /**
     * Form definition.
     */
    public function definition() {
        global $PAGE, $CFG;

        $mform = $this->_form;
        $booste = $this->get_persistent();
        $canedit = helper::can_edit_form($booste->get('id'));

        $points = array(
            'all' => helper::get_booste_points($booste->get('id'), "all"),
            'synthesis' => helper::get_booste_points($booste->get('id'), "synthesis"),
            'evaluation' => helper::get_booste_points($booste->get('id'), "evaluation"),
            'analysis' => helper::get_booste_points($booste->get('id'), "analysis"),
            'application' => helper::get_booste_points($booste->get('id'), "application"),
            'comprehension' => helper::get_booste_points($booste->get('id'), "comprehension"),
            'knowledge' => helper::get_booste_points($booste->get('id'), "knowledge")
        );

        // AAV.
        $mform->addElement('header', 'header_aav', get_string('header_aav', 'local_booste'));
        $mform->addHelpButton('header_aav', 'header_aav', 'local_booste');
        $mform->addElement('html', '
            <div class="container">
                <div class="row">
                    <div class="col"><div id="objective_list"></div></div>
                    <div class="col"><div id="taxonomy_chart"></div></div>
                </div>
            </div>
        ');

        // Tags.
        $mform->addElement('header', 'header_tags', get_string('tags', 'local_booste'));
        $tagshtml = helper::render_booste_tags($booste->get('id'));

        $mform->addElement('html', '
            <div class="form-group row fitem" id="tags">
                <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
                    <label class="d-inline word-break"><b>' . get_string('tags', 'local_booste') . '</b></label>
                </div>
                <div class="col-md-9 form-inline align-items-start felement">' . $tagshtml . '</div>
            </div>
        ');

        if ($canedit) {
            $mform->addHelpButton('header_tags', 'header_tags', 'local_booste');

            $urleditparams = $CFG->wwwroot . "/local/booste/forms/booste_first_form.php?booste=" . $this->_customdata['booste'] . "&course=" . $this->_customdata['course'];
            $urleditgoals = $CFG->wwwroot . "/local/booste/forms/booste_second_form.php?booste=" . $this->_customdata['booste'] . "&course=" . $this->_customdata['course'];

            $editarray = array();
            $editarray[] = $mform->createElement('button', 'edit_params', get_string('edit_params', 'local_booste'), ['onclick' => "location.href='" . $urleditparams . "'"]);
            $editarray[] = $mform->createElement('button', 'edit_goals', get_string('edit_goals', 'local_booste'), ['onclick' => "location.href='" . $urleditgoals . "'"]);
            $mform->addGroup($editarray, 'editar', '', ' ', false);
        }

        // Suggestions.
        $mform->addElement('header', 'header_suggestions', get_string('header_suggestions', 'local_booste'));
        $mform->addHelpButton('header_suggestions', 'header_suggestions', 'local_booste');

        $taxonomyparams = array(
            "data-action" => "refresh_recommendations",
            "data-id" => $booste->get('id'),
            "class" => "btn btn-secondary mr-1 mb-1 booste-taxonomy-filter"
        );

        $taxonomykeys = array('all', 'knowledge', 'comprehension', 'application', 'analysis', 'evaluation', 'synthesis');

        $buttonarray = array();
        foreach ($taxonomykeys as $key) {
            $params = $taxonomyparams + array(
                'id' => 'id_' . $key,
                'data-taxonomy' => $key
            );
            $buttonarray[] = $mform->createElement('button', $key, get_string($key, 'local_booste'), $params);
        }
        $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);

        // Le centrage et le masquage sont désormais gérés en JS en déplaçant les boutons
        // dans #booste-taxonomy-filter-wrapper (voir plus bas), donc aucun CSS de
        // repositionnement n'est nécessaire ici : les boutons gardent leur classe
        // "btn btn-secondary" par défaut, identique à tous les autres boutons du plugin.

        // Couleurs des boutons de taxonomie : mêmes valeurs RGB que la légende du
        // graphique de taxonomie (voir buildChartData() dans activity_form.js), pour que
        // le filtre et le graphique restent visuellement cohérents. Ciblage via
        // [data-action="refresh_recommendations"] (et pas la classe "booste-taxonomy-filter",
        // que Moodle semble ignorer/écraser sur les éléments "button") combiné à
        // [data-taxonomy], qui lui est bien préservé mais aussi présent sur la liste des
        // objectifs (AAV) qu\'on ne veut surtout pas surligner ici.
        $mform->addElement('html', '
            <style>
                [data-action="refresh_recommendations"][data-taxonomy="knowledge"] {
                    background-color: rgb(240, 207, 78) !important;
                    border-color: rgb(240, 207, 78) !important;
                    color: #212529 !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy="comprehension"] {
                    background-color: rgb(140, 93, 217) !important;
                    border-color: rgb(140, 93, 217) !important;
                    color: #fff !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy="application"] {
                    background-color: rgb(255, 140, 63) !important;
                    border-color: rgb(255, 140, 63) !important;
                    color: #212529 !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy="analysis"] {
                    background-color: rgb(175, 220, 253) !important;
                    border-color: rgb(175, 220, 253) !important;
                    color: #212529 !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy="evaluation"] {
                    background-color: rgb(202, 49, 32) !important;
                    border-color: rgb(202, 49, 32) !important;
                    color: #fff !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy="synthesis"] {
                    background-color: rgb(204, 190, 170) !important;
                    border-color: rgb(204, 190, 170) !important;
                    color: #212529 !important;
                }
                [data-action="refresh_recommendations"][data-taxonomy]:hover {
                    filter: brightness(0.92);
                }
            </style>
        ');

        // Zone suggestions.
        $mform->addElement('html', '
            <div class="container mt-2" style="padding-left:0;padding-right:0;">
                <div class="row gx-5">
                    <div class="col-sm">
                        <div id="booste-taxonomy-filter-anchor"></div>
                        <div id="all_suggested_activities" name="taxonomy"></div>
                        <div id="evaluation_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                        <div id="synthesis_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                        <div id="analysis_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                        <div id="application_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                        <div id="comprehension_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                        <div id="knowledge_suggested_activities" name="taxonomy" hidden="hidden" disabled="true"></div>
                    </div>
                    <div class="col-sm"><div id="activity_helper"></div></div>
                </div>
            </div>
        ');

        // Steps.
        $mform->addElement('header', 'header_steps', get_string('header_steps', 'local_booste'));
        $mform->addElement('html', '<div id="booste_step_list"></div>');

        if ($canedit) {
            $mform->addElement('button', 'booste_step', get_string('add_step', 'local_booste'), [
                "id" => "id_booste_step",
                "data-action" => "newboostepopup",
                "data-formname" => "booste_step",
                "data-id" => $this->_customdata['booste'],
                "data-editid" => 0
            ]);
        }

        $chooserconfig = (object)['tabmode' => get_config('core', 'activitychoosertabmode')];
        $mform->addElement('html', '<div id="booste_bottom_anchor"></div>');

        // Actions.
        $submitarray = array();
        if ($canedit) {
            $submitarray[] = $mform->createElement('submit', 'submitbutton', get_string('save'));
            $submitarray[] = $mform->createElement('button', 'deploy', get_string('deploy', 'local_booste'));
            $submitarray[] = $mform->createElement('submit', 'submitbefore', get_string('booste_before', 'local_booste'));
        } else {
            $submitarray[] = $mform->createElement('button', 'button_before', get_string('booste_before', 'local_booste'), [
                "onclick" => "window.location.href='" . $CFG->wwwroot . "/local/booste/forms/booste_second_form.php?course=" . $this->_customdata['course'] . "&booste=" . $booste->get('id') . "'"
            ]);
        }
        $submitarray[] = $mform->createElement('button', 'return_index', get_string('return_index', 'local_booste'), [
            "onclick" => "window.location.href='" . $CFG->wwwroot . "/local/booste/index.php?course=" . $this->_customdata['course'] . "'"
        ]);
        $mform->addGroup($submitarray, 'submitar', '', ' ', false);

        // JS existant.
        $PAGE->requires->js_call_amd('local_booste/refresh_data', 'refreshBoosteDatas', ['id' => $booste->get('id'), 'formName' => "booste_step"]);
        $PAGE->requires->js_call_amd('local_booste/refresh_data', 'refreshBoosteDatas', ['id' => $booste->get('id'), 'formName' => "objective"]);
        $PAGE->requires->js_call_amd('local_booste/refresh_data', 'refreshRecommendations', ['points' => $points]);

        $safecourseid = !empty($this->_customdata['course']) ? (int)$this->_customdata['course'] : 0;
        $safeboosteid = !empty($this->_customdata['booste']) ? (int)$this->_customdata['booste'] : 0;

        if ($safecourseid > 0 && $safeboosteid > 0) {
            $PAGE->requires->js_call_amd('local_booste/activity_form', 'init', [$safecourseid, $safeboosteid, $chooserconfig]);
            $PAGE->requires->js_call_amd('local_booste/activity_form', 'recommendations', [$safecourseid, $safeboosteid, "all", $points['all']]);
            $PAGE->requires->js_call_amd('local_booste/activity_form', 'initChart', [$safeboosteid]);
        }

        if ($canedit) {
            $PAGE->requires->js_call_amd('local_booste/popup_form', 'init', ['booste_step', 1]);
            $PAGE->requires->js_call_amd('local_booste/popup_form', 'deployBooste', [
                ['id' => $safeboosteid, 'is_deployed' => $booste->get('is_deployed')],
                $safecourseid
            ]);
        }

        // JS inline: n'afficher que "Toutes" + taxonomies sélectionnées, sans placeholder gris.
        // NOTE: on n'utilise volontairement PAS require(['jquery'], ...) ici. Depuis Moodle
        // 4.5/5.0, déclarer 'jquery' comme dépendance AMD brute dans un script inline peut
        // déclencher "amd.exposeJquery is not a function", ce qui casse l'exposition de
        // jQuery pour TOUTE la page et provoque en cascade des erreurs "$ is not a function"
        // jusque dans les modules AMD du core. Cela casse silencieusement les composants
        // Bootstrap (dont ce groupe de boutons), même si le template et les données sont
        // corrects. On utilise donc du JS natif (voir le même choix dans activity_form.js).
        $PAGE->requires->js_amd_inline(<<<'JS'
(function() {

    const TAXONOMIES = ['knowledge', 'comprehension', 'application', 'analysis', 'evaluation', 'synthesis'];

    function getSelectedTaxonomies() {
        const set = {};
        document.querySelectorAll('#objective_list [data-taxonomy]').forEach(function(el) {
            const key = (el.getAttribute('data-taxonomy') || '').toString().trim();
            if (key && TAXONOMIES.indexOf(key) !== -1) {
                set[key] = true;
            }
        });
        return set;
    }

    // Pool des vrais boutons (récupérés une seule fois). On les déplace ensuite dans
    // notre wrapper au lieu de jouer avec des règles CSS qui peuvent perdre face au
    // thème (spécificité, !important en cascade, etc.).
    const buttonPool = {};

    function collectButtons() {
        ['all'].concat(TAXONOMIES).forEach(function(key) {
            if (buttonPool[key] && document.body.contains(buttonPool[key])) {
                return;
            }
            const btn = document.querySelector('[data-taxonomy="' + key + '"]')
                || document.getElementById('id_' + key);
            if (btn) {
                buttonPool[key] = btn;
            }
        });
        return Object.keys(buttonPool).length > 0;
    }

    // Conteneurs neufs, entièrement sous notre contrôle (aucune classe/structure
    // Bootstrap héritée du thème) :
    // - #wrapper : les boutons actuellement affichés, centrés en flex.
    // - #pool : les boutons actuellement masqués. Ils restent dans le document (donc
    //   toujours trouvés par refresh_data.js qui attache leurs écouteurs de clic au
    //   chargement de la page) mais dans un simple <div> sans classe ".btn", que le
    //   thème ne peut donc pas re-styler en display:inline-block malgré lui.
    // On les insère au-dessus du tableau de suggestions (#booste-taxonomy-filter-anchor),
    // dans sa propre colonne, plutôt que dans la rangée complète du formulaire : cette
    // dernière contient aussi la colonne "activity_helper", ce qui décalait le centrage
    // par rapport au tableau lui-même.
    function getOrCreateContainers() {
        let wrapper = document.getElementById('booste-taxonomy-filter-wrapper');
        let pool = document.getElementById('booste-taxonomy-filter-pool');
        if (wrapper && pool) {
            return {wrapper: wrapper, pool: pool};
        }

        const anchor = document.getElementById('booste-taxonomy-filter-anchor');
        const oldGroup = document.getElementById('fgroup_id_buttonar');

        wrapper = document.createElement('div');
        wrapper.id = 'booste-taxonomy-filter-wrapper';
        wrapper.style.cssText = 'display:flex;flex-wrap:wrap;justify-content:center;'
            + 'align-items:center;width:100%;gap:.5rem;margin:0 auto 1rem auto;';

        pool = document.createElement('div');
        pool.id = 'booste-taxonomy-filter-pool';
        pool.style.cssText = 'display:none;';

        if (anchor && anchor.parentNode) {
            anchor.parentNode.insertBefore(wrapper, anchor);
            anchor.parentNode.insertBefore(pool, anchor);
        }

        // L'ancien groupe Bootstrap (avec sa colonne label) ne sert plus qu'à retenir les
        // boutons avant leur premier déplacement : on le retire complètement du DOM.
        if (oldGroup && oldGroup.parentNode) {
            oldGroup.parentNode.removeChild(oldGroup);
        }

        return {wrapper: wrapper, pool: pool};
    }

    function applyButtonsVisibility() {
        if (!collectButtons()) {
            return;
        }

        const containers = getOrCreateContainers();
        const selected = getSelectedTaxonomies();
        const wanted = ['all'].concat(TAXONOMIES.filter(function(key) {
            return !!selected[key];
        }));

        // On ne fait que déplacer les vrais noeuds entre les deux conteneurs : les
        // boutons gardent leurs écouteurs d'évènements puisque ce sont les mêmes
        // éléments déplacés, pas des copies.
        Object.keys(buttonPool).forEach(function(key) {
            const btn = buttonPool[key];
            const target = wanted.indexOf(key) !== -1 ? containers.wrapper : containers.pool;
            if (btn.parentNode !== target) {
                target.appendChild(btn);
            }
        });
    }

    function refreshUI() {
        applyButtonsVisibility();
    }

    refreshUI();
    setTimeout(refreshUI, 250);
    setTimeout(refreshUI, 800);
    setTimeout(refreshUI, 1500);

    // MutationObserver plutôt que l'évènement obsolète DOMNodeInserted (retiré des
    // navigateurs modernes), pour réagir au rechargement AJAX des objectifs/suggestions.
    const watchedIds = ['objective_list', 'all_suggested_activities'];
    const watchedNodes = new WeakSet();

    function watchNode(node) {
        if (!node || watchedNodes.has(node)) return;
        watchedNodes.add(node);
        new MutationObserver(refreshUI).observe(node, {childList: true, subtree: true});
    }

    watchedIds.forEach(function(id) {
        watchNode(document.getElementById(id));
    });

    // Si les conteneurs n'existent pas encore au chargement initial du formulaire.
    new MutationObserver(function() {
        watchedIds.forEach(function(id) {
            watchNode(document.getElementById(id));
        });
        refreshUI();
    }).observe(document.body, {childList: true, subtree: true});
})();
JS
);

        $PAGE->requires->string_for_js('all', 'local_booste');

        $mform->setExpanded('header_suggestions');
        $mform->setExpanded('header_tags');
        $mform->setExpanded('header_steps');
    }
}
