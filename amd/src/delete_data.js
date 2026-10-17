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
 * @module     local_booste/delete_data
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import Ajax from 'core/ajax';
import Notification from "core/notification";
import { refreshBoosteDatas } from "local_booste/refresh_data";
import {get_string as getString} from 'core/str';

/**
 * Init delete depending of element put in formName
 *
 * @method init
 * @param {String} formName name of type of element
 */
export const init = (formName) => {
    // In this example we will open the modal dialogue with the form when user clicks on the edit link:
    document.querySelectorAll('[name='+formName+'][data-action=delete][data-id]').forEach(
        (tag) => {
            tag.addEventListener('click', e => {
                const id = e.currentTarget.dataset.id;
                const booste = e.currentTarget.dataset.booste;

                if(formName == "booste_step") {
                    var urlParams = new URLSearchParams(window.location.search);
                    var boosteid = urlParams.get('booste');
                    const request = {
                        methodname: 'local_booste_get_booste_steps',
                        args: {
                            id: boosteid
                        }
                    };
                    Ajax.call([request])[0].then((data) => {
                        if(data.length < 2) {
                            window.scrollTo(0, 0);
                            getString('only_one_step_left', 'local_booste')
                            .then(str => {
                                Notification.addNotification({
                                    type: "error",
                                    message: str
                                });
                                return;
                            })
                            .catch();
                        }
                        else {
                            deleteData(formName, id, booste);
                        }
                    }).catch(Notification.exception);

                }
                else {
                    deleteData(formName, id, booste);
                }

            });
        });
};

/**
 * Delete an element
 *
 * @method init
 * @param {String} formName name of type of element
 * @param {Number} id id of element
 * @param {Number} booste id of actual booste
 */
const deleteData = (formName, id, booste) => {
    Notification.confirm(
        getString(formName, 'local_booste'),
        getString('delete_'+formName+'_confirm', 'local_booste'),
        getString('delete'),
        getString('cancel'),
        () => {
            const request = {
                methodname: 'local_booste_delete_'+formName,
                args: {
                    id: id
                }
            };
            Ajax.call([request])[0].then(() => {
                switch(formName) {
                    case "booste":
                        var url = window.location.href;
                        var urlParams = new URLSearchParams(window.location.search);
                        var courseid = urlParams.get('course');

                        url = url.split("booste/")[0];
                        url += "booste/index.php?course="+courseid;
                        window.location.href = url;
                        break;
                    case "ext_activity":
                    case "tag":
                    case "element":
                    case "objective":
                        document.location.reload();
                        break;
                    default:
                        refreshBoosteDatas(booste, formName);
                        break;
                }
            }).catch(Notification.exception);
     });
};