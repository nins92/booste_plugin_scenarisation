<?php
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
 * Plugin administration pages are defined here.
 *
 * @package     local_booste
 * @category    admin
 * @copyright   2022 ENSAM <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $category = new admin_category('local_booste_settings', new lang_string('pluginname', 'local_booste'));
    $ADMIN->add('localplugins', $category);
    $settingspage = new admin_settingpage('managelocalbooste', new lang_string('manage', 'local_booste'));
    
    // CORRIGÉ : Chaque page a un identifiant unique !
    $boostessettings = new admin_externalpage(
        'booste_boostes_settings',
        new lang_string('boostes_settings', 'local_booste'),
        new moodle_url('/local/booste/admin/boostes_settings.php')
    );
    $activitiessettings = new admin_externalpage(
        'booste_activities_settings',
        new lang_string('activities_settings', 'local_booste'),
        new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "int"))
    );
    $extactivitiessettings = new admin_externalpage(
        'booste_ext_activities_settings',
        new lang_string('ext_activities_settings', 'local_booste'),
        new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "ext"))
    );
    $tagssettings = new admin_externalpage(
        'booste_tags_settings',
        new lang_string('tags_settings', 'local_booste'),
        new moodle_url('/local/booste/admin/tags_settings.php')
    );
    $fieldssettings = new admin_externalpage(
        'booste_fields_settings',
        new lang_string('fields_settings', 'local_booste'),
        new moodle_url('/local/booste/admin/fields_settings.php')
    );

    $ADMIN->add('local_booste_settings', $boostessettings);
    $ADMIN->add('local_booste_settings', $activitiessettings);
    $ADMIN->add('local_booste_settings', $extactivitiessettings);
    $ADMIN->add('local_booste_settings', $tagssettings);
    $ADMIN->add('local_booste_settings', $fieldssettings);
}
