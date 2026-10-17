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

namespace local_booste\external;

use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

/**
 * Returns the MOD_ARCHETYPE_* of every installed activity module, computed
 * with plugin_supports() (a long-stable core API), rather than relying on
 * the "archetype" field of core_course_get_course_content_items /
 * core_course/local/activitychooser/repository. That field's availability
 * and reliability has proven to vary across Moodle versions (the activity
 * chooser code itself has been relocated/refactored between releases),
 * which silently broke the resources-vs-activities split in the "Add an
 * activity or resource" chooser. Computing it ourselves is version-proof.
 */
class get_module_archetypes extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([]);
    }

    /**
     * Returns the archetype of every installed activity module.
     *
     * @return array
     */
    public static function execute(): array {
        self::validate_parameters(self::execute_parameters(), []);

        $list = [];
        foreach (\core_component::get_plugin_list('mod') as $modname => $unused) {
            $archetype = plugin_supports('mod', $modname, FEATURE_MOD_ARCHETYPE, MOD_ARCHETYPE_OTHER);
            $list[] = [
                'name' => $modname,
                'archetype' => (int) $archetype,
            ];
        }

        return $list;
    }

    /**
     * Returns description of method result value.
     *
     * @return external_multiple_structure
     */
    public static function execute_returns(): external_multiple_structure {
        return new external_multiple_structure(
            new external_single_structure([
                'name' => new external_value(PARAM_PLUGIN, 'Module name (e.g. "page", "quiz")'),
                'archetype' => new external_value(PARAM_INT, 'MOD_ARCHETYPE_* constant for this module'),
            ])
        );
    }
}
