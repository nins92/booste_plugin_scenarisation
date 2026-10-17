<?php

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
 * Services are defined here.
 *
 * @package     local_booste
 * @category    services
 * @copyright   2022 ENSAM <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


$functions = array(
        'local_booste_get_verbs' => array(
                'classname' => 'local_booste\external\get_verbs',
                'description' => 'Get verbs from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_objectives' => array(
                'classname' => 'local_booste\external\get_objectives',
                'description' => 'Get objectives from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_evaluations' => array(
                'classname' => 'local_booste\external\get_evaluations',
                'description' => 'Get evaluations from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_booste_steps' => array(
                'classname' => 'local_booste\external\get_booste_steps',
                'description' => 'Get booste steps from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_elements' => array(
                'classname' => 'local_booste\external\get_elements',
                'description' => 'Get booste steps elements from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_module_archetypes' => array(
                'classname' => 'local_booste\external\get_module_archetypes',
                'description' => 'Get the MOD_ARCHETYPE_* of every installed activity module, ' .
                        'computed server-side with plugin_supports() for the activity/resource chooser.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_recommendations' => array(
                'classname' => 'local_booste\external\get_recommendations',
                'description' => 'Get suggested activities from Booste entity ID.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_activity_helper' => array(
                'classname' => 'local_booste\external\get_activity_helper',
                'description' => 'Get helper for a suggested activity.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_module' => array(
                'classname' => 'local_booste\external\get_module',
                'description' => 'Get module of element.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_get_ext_activities' => array(
                'classname' => 'local_booste\external\get_ext_activities',
                'description' => 'Get activities out of moodle.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_objective' => array(
                'classname' => 'local_booste\external\delete_objective',
                'description' => 'Delete an objective.',
                'type' => 'write',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_evaluation' => array(
                'classname' => 'local_booste\external\delete_evaluation',
                'description' => 'Delete an evaluation.',
                'type' => 'write',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_booste_step' => array(
                'classname' => 'local_booste\external\delete_booste_step',
                'description' => 'Delete a step.',
                'type' => 'write',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_element' => array(
                'classname' => 'local_booste\external\delete_element',
                'description' => 'Delete an element.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_booste' => array(
                'classname' => 'local_booste\external\delete_booste',
                'description' => 'Delete a scenario.',
                'type' => 'write',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_ext_activity' => array(
                'classname' => 'local_booste\external\delete_ext_activity',
                'description' => 'Delete an exterior activity',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_delete_tag' => array(
                'classname' => 'local_booste\external\delete_tag',
                'description' => 'Delete a tag',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_can_edit_booste' => array(
                'classname' => 'local_booste\external\can_edit_booste',
                'description' => 'Check if user can edit booste.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        ),
        'local_booste_reorder_elements' => array(
                'classname' => 'local_booste\external\reorder_elements',
                'description' => 'Reorder elements.',
                'type' => 'read',
                'ajax' => true,
                'loginrequired' => true,
        )
);