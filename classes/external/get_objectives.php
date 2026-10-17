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
use local_booste\objective;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_objectives extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'id' => new external_value(PARAM_INT, 'Booste ID'),
        ]);
    }

    /**
     * Returns the list of objectives of a scenario.
     *
     * @param int $id
     * @return \stdClass[]
     */
    public static function execute(int $id): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
        ]);
        $boosteid = $params['id'];
        $list = objective::get_records(['booste' => $boosteid]);
        foreach($list as $key => $objective) {
            $tax_name = $DB->get_field('local_booste_list_tags', 'name', array('id' => $objective->get('taxonomy')));
            $objective->set('taxonomy_name', $tax_name);
        }
        return !empty($list) ? array_map(function(persistent $bo) { return $bo->to_record();}, $list) : [];
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
                        'booste' => new external_value(PARAM_INT, 'Booste\'s objective'),
                        'taxonomy' => new external_value(PARAM_INT, 'Booste\'s objective\'s taxonomy'),
                        'taxonomy_name' => new external_value(PARAM_TEXT, 'Booste\'s objective\'s taxonomy name'),
                        'objective_sentence' => new external_value(PARAM_TEXT, 'Booste\'s objective sentence'),
                ])
        );
    }
}
