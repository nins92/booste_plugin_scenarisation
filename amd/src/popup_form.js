// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Toutes les popups (modales) de booste : création/édition, déploiement, duplication.
 *
 * NOTE: pas de dépendance 'jquery' ici volontairement. Sur Moodle 4.5/5.0, une dépendance
 * AMD 'jquery' brute déclarée par un plugin tiers peut déclencher
 * "amd.exposeJquery is not a function", ce qui casse ensuite l'exposition globale de
 * jQuery pour toute la page et fait planter le JS cœur qui en dépend encore
 * (ex: core_form/events.js), même quand le HTML/les données de booste sont corrects.
 *
 * @module     local_booste/popup_form
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'core/ajax',
    'core_form/modalform',
    'core/str',
    'core/notification'
], function(Ajax, ModalForm, Str, Notification) {

    'use strict';

    /**
     * Get string via get_string (composant local_booste).
     *
     * @param {String} name
     * @return {Promise}
     */
    const getString = (name) => Str.get_string(name, 'local_booste');

    /**
     * Init the creation or the edit of an activity, objective, guideline, resource or a step.
     *
     * @param {String} formName
     * @param {Boolean} isNew
     */
    const init = (formName, isNew) => {
        // Sélecteur dynamique selon l'action (ajout ou édition).
        const selector = isNew
            ? '[data-action="newboostepopup"][data-formname="' + formName + '"]'
            : '[data-action="editboostepopup"][data-formname="' + formName + '"]';

        // Délégation d'événement sur le document, sans jQuery, pour éviter les conflits
        // de chargement (le bouton peut être injecté dynamiquement après l'init).
        document.addEventListener('click', (e) => {
            const element = e.target.closest(selector);
            if (!element) {
                return;
            }
            e.preventDefault();

            // Récupération des paramètres de l'URL.
            const urlParams = new URLSearchParams(window.location.search);
            const courseid = urlParams.get('course') || 0;
            const boosteid = urlParams.get('booste') || 0;

            // Données stockées dans les attributs data- du bouton.
            const id = element.dataset.id || 0;
            const editid = element.dataset.editid || 0;

            // Cas particulier : l'édition d'un élément (label, activité, ressource...) ne
            // passe pas par un core_form\dynamic_form (il n'existe pas de classe
            // 'local_booste\\form\\element_form'), mais par la page complète modedit.php,
            // exactement comme pour l'ajout d'un élément.
            if (formName === 'element') {
                let url = window.location.href;
                url = url.split('booste_third_form')[0];
                url += 'modedit.php?update=' + editid + '&course=' + courseid +
                    '&booste=' + boosteid + '&booste_step=' + id + '&sr=&return=0';
                window.location.href = url;
                return;
            }

            let challengedata = '';

            // Logique spécifique pour collecter les données avant d'ouvrir la modale "challenge".
            if (formName === 'challenge') {
                const challengeOptions = Array.from(document.querySelectorAll('#id_challenge option:checked'));
                const learningModeSelected = document.querySelector('[name^=learning_mode]:checked');

                challengedata = JSON.stringify({
                    challenge: challengeOptions.map(o => o.value),
                    learning_mode: learningModeSelected ? learningModeSelected.value : ''
                });
            }

            // 1. On récupère d'abord le titre (Str.get_string est asynchrone).
            getString(formName).then(function(title) {

                // 2. On instancie la modale une fois le titre reçu.
                const modalForm = new ModalForm({
                    formClass: 'local_booste\\form\\' + formName + '_form',
                    args: {
                        id: id,
                        booste: boosteid,
                        editid: editid,
                        courseid: courseid,
                        challengedata: challengedata
                    },
                    modalConfig: {
                        title: title
                    },
                    returnFocus: element,
                });

                // Événement : recharger la page si le formulaire est validé.
                modalForm.addEventListener(modalForm.events.FORM_SUBMITTED, function() {
                    window.location.reload();
                });

                modalForm.show();
                return;
            }).catch(Notification.exception);
        });
    };

    /**
     * Deploy all activities/resources in the actual course.
     *
     * @param {Object} booste id/is_deployed of actual booste
     * @param {Number} courseid
     */
    const deployBooste = (booste, courseid) => {
        const deployButton = document.getElementById('id_deploy');
        if (!deployButton) {
            return;
        }
        deployButton.classList.remove('btn-secondary');
        deployButton.classList.add('btn-primary');
        deployButton.addEventListener('click', () => {
            document.querySelector('#page-header').scrollIntoView();
            let isDeployable = 1;

            if (isDeployable === 1) {
                const request1 = {
                    methodname: 'local_booste_get_booste_steps',
                    args: {
                        id: booste.id
                    }
                };
                Ajax.call([request1])[0].then(function(context1) {
                    const elements = context1.map((item) => {
                        const request2 = {
                            methodname: 'local_booste_get_elements',
                            args: {
                                id: item.id
                            }
                        };
                        return Ajax.call([request2])[0].then(function(context2) {
                            if (context2.length === 0) {
                                isDeployable = 0;
                            }
                        }).catch(Notification.exception);
                    });

                    Promise.all(elements).then(function() {
                        if (isDeployable === 1) {
                            const modalForm = new ModalForm({
                                // Name of the class where form is defined (must extend \core_form\dynamic_form):
                                formClass: 'local_booste\\form\\booste_fourth_form',
                                // Add as many arguments as you need, they will be passed to the form:
                                args: {booste: booste.id, course: courseid},
                                // Pass any configuration settings to the modal dialogue, for example, the title:
                                modalConfig: {
                                    title: getString('deploy'),
                                    buttons: [getString('booste_deploy')]
                                },
                                // DOM element that should get the focus after the modal dialogue is closed:
                                returnFocus: null,
                            });
                            modalForm.addEventListener(modalForm.events.FORM_SUBMITTED, (e) => {
                                let url = window.location.href;
                                url = url.split('booste_third_form')[0];
                                url += 'deploy.php?courseid=' + e.detail.course + '&boosteid=' + e.detail.booste +
                                    '&deploy=' + e.detail.deploy;
                                window.location.href = url;
                            });
                            modalForm.show();
                        } else {
                            getString('elements_missing').then(str => {
                                Notification.addNotification({
                                    type: 'error',
                                    message: str
                                });
                                return;
                            }).catch(Notification.exception);
                        }
                        return;
                    });
                    return;
                }).catch(Notification.exception);
            } else {
                getString('already_deployed').then(str => {
                    Notification.addNotification({
                        type: 'error',
                        message: str
                    });
                    return;
                }).catch(Notification.exception);
            }
        });
    };

    /**
     * Duplicate a scenario.
     *
     * @param {Number} id
     */
    const duplicateBooste = (id) => {
        const trigger = document.querySelector('[data-action="duplicatebooste"][data-id="' + id + '"]');
        if (!trigger) {
            return;
        }
        trigger.addEventListener('click', (e) => {
            const course = e.target.dataset.course;
            const modalForm = new ModalForm({
                // Name of the class where form is defined (must extend \core_form\dynamic_form):
                formClass: 'local_booste\\form\\booste_duplicate_form',
                // Add as many arguments as you need, they will be passed to the form:
                args: {id: id, course: course},
                // Pass any configuration settings to the modal dialogue, for example, the title:
                modalConfig: {
                    title: getString('booste_duplicate'),
                    buttons: [Str.get_string('confirm', 'moodle')]
                },
                // DOM element that should get the focus after the modal dialogue is closed:
                returnFocus: null,
            });
            modalForm.addEventListener(modalForm.events.FORM_SUBMITTED, (submitEvent) => {
                getString('duplicated').then(str => {
                    document.querySelector('#page-header').scrollIntoView();
                    str = str.replace('<a', "<a href='" + submitEvent.detail + "' ");
                    Notification.addNotification({
                        type: 'success',
                        message: str
                    });
                    return;
                }).catch(Notification.exception);
            });
            modalForm.show();
        });
    };

    return {
        init: init,
        deployBooste: deployBooste,
        duplicateBooste: duplicateBooste
    };
});
