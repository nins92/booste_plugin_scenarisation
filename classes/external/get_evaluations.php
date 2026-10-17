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
use local_booste\evaluation;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_evaluations extends external_api {

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
     * Returns the list of evaluations of a scenario.
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
        $list = $DB->get_records('local_booste_evaluation', array('booste' => $boosteid));
        foreach($list as $key => $eval) {
            $name = $DB->get_field('local_booste_list_tags', 'name', array("id" => $eval->evaluation_type));
            $list[$key]->evaluation_type_name = get_string($name, 'local_booste');
        }
        return !empty($list) ? $list : [];
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
                        'booste' => new external_value(PARAM_INT, 'Booste\'s evaluation'),
                        'evaluation_type' => new external_value(PARAM_INT, 'Evaluation type'),
                        'evaluation_type_name' => new external_value(PARAM_TEXT, 'Evaluation type name'),
                        'description' => new external_value(PARAM_TEXT, 'Evaluation\'s description'),
                ])
        );
    }
}
