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
use local_booste\element;
use local_booste\booste;
use local_booste\booste_step;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class delete_element extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'id' => new external_value(PARAM_INT, 'ID'),
        ]);
    }

    /**
     * Delete an element.
     *
     * @param int $id
     */
    public static function execute(int $id): array {
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
        ]);
        $id = $params['id'];
        $element = element::get_record(['id' => $id]);
        $booste_step = booste_step::get_record(['id' => $element->get('booste_step')]);
        $booste = booste::get_record(['id' => $booste_step->get('booste')]);
        $context = \context_course::instance($booste->get('course'));
        external_api::validate_context($context);
        if (!has_capability('local_booste/boostes:delete', $context)) {
            throw new \restricted_context_exception();
        }
        $element->delete();
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
