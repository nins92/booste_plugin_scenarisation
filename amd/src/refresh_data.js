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

/*
 * @module     local_booste/refresh_data
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import Ajax from "core/ajax";
import Templates from "core/templates";
import Notification from "core/notification";
import {recommendations as recommendations} from 'local_booste/activity_form';

/**
 * Refresh the type of data put in formName
 *
 * @method refreshBoosteDatas
 * @param {Number} id id of element
 * @param {String} formName name of type of element
 */
export const refreshBoosteDatas = (id, formName) => {
    const request = {
        methodname: 'local_booste_get_'+formName+'s',
        args: {
            id: id
        }
    };
    Ajax.call([request])[0].then(function(context) {

        const url = window.location;
        const urlParams = new URLSearchParams(url.search);
        const boosteId = urlParams.get('booste');
        const canEditRequest = {
            methodname: 'local_booste_can_edit_booste',
            args: {
                id: boosteId
            }
        };
        Ajax.call([canEditRequest])[0].then(function(canEdit) {
            var params = {
                canedit : canEdit.canedit,
                elements : context
            };

            switch(formName) {
                case "objective":
                    if(JSON.stringify(url).includes('third')) {
                        params.canedit = false;
                    }
                    var popupid = document.getElementById('objective_list');
                    Templates.render('local_booste/objectives', params).then(function(html, js) {
                        Templates.replaceNodeContents(popupid, html, js);
                    });
                    break;
                case "evaluation":
                    var popupid = document.getElementById('evaluation_list');
                    Templates.render('local_booste/evaluations', params).then(function(html, js) {
                        Templates.replaceNodeContents(popupid, html, js);
                    });
                    break;
                case "booste_step":
                    var popupid = document.getElementById('booste_step_list');
                    Templates.render('local_booste/booste_steps', params).then(function(html, js) {
                        Templates.replaceNodeContents(popupid, html, js);
                    });
                    break;
                case "element":
                    var popupid = document.getElementById('step_'+id+'_elements_list');
                    Templates.render('local_booste/elements', params).then(function(html, js) {
                        Templates.replaceNodeContents(popupid, html, js);
                    });
                    break;
                default:
                    break;
            }
        }).catch(Notification.exception);
    }).catch(Notification.exception);
};

/**
 * Refresh recommendations of activities
 *
 * @method refreshRecommendations
 * @param {Number} points number of points of the scenario to compare with the recommended values of activities
 */
export const refreshRecommendations = (points) => {
    let refreshers = document.querySelectorAll('[data-action=refresh_recommendations]');

    refreshers.forEach(refresher => {

        console.log('refresher', refresher);
        const taxonomy = refresher.id.substring(3);
        const urlParams = new URLSearchParams(window.location.search);
        const boosteId = urlParams.get('booste');
        const courseId = urlParams.get('course');

        recommendations(courseId, boosteId, taxonomy, points[taxonomy]);

        refresher.addEventListener('click', () => {
            console.log("refresh ", taxonomy);
            document.getElementsByName("taxonomy").forEach(element => {
                element.hidden = true;
            });
            document.getElementById(taxonomy+"_suggested_activities").hidden = false;

            document.querySelectorAll("[data-action=refresh_recommendations]").forEach((element) => {
                element.classList.remove("active");
            })
            document.getElementById('id_' + taxonomy).classList.add("active");
        });
    });
};