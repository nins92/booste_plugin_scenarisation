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
 * Plugin upgrade steps are defined here.
 *
 * @package     local_booste
 * @category    upgrade
 * @copyright   2022 ENSAM <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/upgradelib.php');

/**
 * Execute local_booste upgrade from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_local_booste_upgrade($oldversion)
{
    global $DB;

    $dbman = $DB->get_manager();

    $table = new xmldb_table('local_booste_list_fields');
    $field = new xmldb_field('helper', XMLDB_TYPE_TEXT, null, null, null, null, null, 'points');

    // Conditionally launch add field helper.
    if (!$dbman->field_exists($table, $field)) {
        $dbman->add_field($table, $field);
    }


    if ($oldversion < 2023111300) {


        // For further information please read {@link https://docs.moodle.org/dev/Upgrade_API}.
        //
        // You will also have to create the db/install.xml file by using the XMLDB Editor.
        // Documentation for the XMLDB Editor can be found at {@link https://docs.moodle.org/dev/XMLDB_editor}.

    }

    // Always return true: Moodle's core upgrade code calls
    // upgrade_plugin_savepoint() with this function's return value right
    // after invoking it, and throws an upgrade_exception if that value is
    // falsy. Returning null here (the previous behaviour whenever
    // $oldversion was not < 2023111300) broke every subsequent upgrade.
    return true;
}
