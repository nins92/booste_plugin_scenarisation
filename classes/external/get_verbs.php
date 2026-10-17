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

use core\persistent;
use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_verbs extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'taxonomyid' => new external_value(PARAM_INT, 'taxonomy ID'),
        ]);
    }

    /**
     * Returns the list of verbs of a scenario.
     *
     * @param int $taxonomyid
     * @return \stdClass[]
     */
    public static function execute(int $taxonomyid): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'taxonomyid' => $taxonomyid,
        ]);
        $taxonomyid = $params['taxonomyid'];
        $list = $DB->get_records("local_booste_list_verb", array("taxonomy" => $taxonomyid), "", "id, name");

        foreach($list as $key => $verb) {
            $list[$key]->name = get_string($verb->name, 'local_booste');
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
                        'id' => new external_value(PARAM_INT, 'Booste id'),
                        'name' => new external_value(PARAM_TEXT, 'Booste\'s verb'),
                ])
        );
    }
}
