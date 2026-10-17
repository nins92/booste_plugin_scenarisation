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
use local_booste\ext_activity;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_ext_activities extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'id' => new external_value(PARAM_INT, 'Course ID'),
        ]);
    }

    /**
     * Returns the list of activities outside Moodle.
     *
     * @param int $id
     * @return \stdClass[]
     */
    public static function execute(int $id): array {
        global $DB, $OUTPUT, $CFG;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
        ]);
        require_login($id);
        $activities = $DB->get_records('local_booste_ext_activities');

        foreach($activities as $activity) {
            $item = new \stdClass();
            $item->id = $activity->id;
            $item->title = $activity->name;
            $item->link = $activity->link;
            //$item->icon = $OUTPUT->pix_icon('moodle', '', 'moodle', ['class' => 'icon']);
            $item->icon = '<img class="icon icon" alt="" aria-hidden="true" src="'.$activity->icon.'">';
            // $item->warning_icon = $OUTPUT->pix_icon('not_moodle', get_string("unavailable_in_moodle", "local_booste"), 'core', ['class' => 'icon']);
            $item->warning_icon = "<img src='".$CFG->wwwroot."/local/booste/pix/icon_not_moodle2.jpg' height=\"24\" width=\"24\" title=\"" . get_string("unavailable_in_moodle", "local_booste") . "\" />";
            $item->activity_type = "ext";
            $list[] = $item;
        }


        return !empty($list) ?  $list : [];
    }

    /**
     * Returns description of method result value.
     *
     * @return external_multiple_structure
     */
    public static function execute_returns(): external_multiple_structure {
        return new external_multiple_structure(
                new external_single_structure([
                        'id' => new external_value(PARAM_INT, 'Activity id'),
                        'title' => new external_value(PARAM_TEXT, 'Activity title'),
                        'link' => new external_value(PARAM_TEXT, 'Activity link'),
                        'icon' => new external_value(PARAM_RAW, 'Activity default icon'),
                        'warning_icon' => new external_value(PARAM_RAW, 'Activity warning icon'),
                        'activity_type' => new external_value(PARAM_TEXT, 'Activity default icon'),
                ])
        );
    }
}
