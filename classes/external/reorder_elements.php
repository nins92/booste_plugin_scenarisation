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

class reorder_elements extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'list' => new external_value(PARAM_RAW, 'taxonomy ID'),
        ]);
    }

    /**
     * Reorder elements.
     *
     * @param string $list
     * @return \array[]
     */
    public static function execute(string $list): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'list' => $list,
        ]);
        $list = $params['list'];
        $list = json_decode($list);

        foreach($list as $el) {
            $DB->update_record("local_booste_step_element", array("booste_step" => $el->booste_step, "idx" => $el->idx, "id" => $el->id));
        }

        return [];
    }

    /**
     * Returns description of method result value.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([]);
    }
}
