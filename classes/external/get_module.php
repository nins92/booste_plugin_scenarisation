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
use local_booste\element;
use local_booste\module;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_module extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'id' => new external_value(PARAM_INT, 'activity ID'),
        ]);
    }

    /**
     * Returns a module.
     *
     * @param int $id
     * @return \stdClass[]
     */
    public static function execute(int $id): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
        ]);
        $boostestep = $params['id'];
        $element = element::get_record(['id' => $id]);
        $element->set('data', htmlspecialchars_decode($element->get('data')));

        return (array) $element->to_record();
    }

    /**
     * Returns description of method result value.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
                'id' => new external_value(PARAM_INT, 'Booste id'),
                'booste_step' => new external_value(PARAM_INT, 'Booste\'s step'),
                'module' => new external_value(PARAM_INT, 'Booste\'s module\'s id'),
                'element_type' => new external_value(PARAM_TEXT, 'Booste\'s element type'),
                'name' => new external_value(PARAM_TEXT, 'Booste\'s element\'s name'),
                'idx' => new external_value(PARAM_INT, 'Booste\'s element index'),
                'data' => new external_value(PARAM_RAW, 'Booste\'s element\'s data'),
                'archetype' => new external_value(PARAM_INT, 'Booste\'s element archetype'),
        ]);
    }
}
