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

class get_recommendations extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'id' => new external_value(PARAM_INT, 'booste ID'),
                'taxonomy' => new external_value(PARAM_TEXT, 'taxonomy name'),
        ]);
    }

    /**
     * Returns the list of recommendations of a scenario.
     *
     * @param int $id
     * @param string $taxonomy
     * @return array
     */
    public static function execute(int $id, string $taxonomy): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
                'taxonomy' => $taxonomy,
        ]);
        $booste = $params['id'];
        

        if($taxonomy == "all") {
            $taxonomies = 'lblf.name = "taxonomy"';
        }
        else {
            $taxonomies = 'lblt.name = "'.$taxonomy.'"';
        }

        $course_time = $DB->get_field_sql(
                'SELECT lblt.name FROM {local_booste_tags} lbt
                LEFT JOIN {local_booste_list_tags} lblt  ON lbt.tag = lblt.id
                LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                WHERE lbt.booste = (?) AND lblf.name = "course_time"', array("booste" => $booste));

        switch($course_time) {
            case "course_under_60_mn":
                $activity_time = " AND activity NOT IN 
                                        (SELECT activity FROM {local_booste_suggestions} lbs
                                        LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                        LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                        WHERE lblt.name = 'over_60mn' AND ext_activity IS NULL GROUP BY activity) ";

                $ext_activity_time = " AND ext_activity NOT IN 
                                            (SELECT ext_activity FROM {local_booste_suggestions} lbs
                                            LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                            LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                            WHERE lblt.name = 'over_60mn' AND activity IS NULL GROUP BY ext_activity) ";
                break;
            case "course_between_1h_and_1h30":
            case "course_between_1h_and_2h":
            case "course_over_2h":
                $activity_time = "";
                $ext_activity_time = "";
                break;
        }
        
        $sql = "SELECT lbs.id,activity, ext_activity, SUM(points) as points
                FROM {local_booste_suggestions} lbs 
                LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id
                WHERE lbs.tag IN
                    (SELECT tag
                    FROM
                    {local_booste_tags} lbt
                    LEFT JOIN {local_booste_list_tags} lblt  ON lbt.tag = lblt.id
                    WHERE
                    booste = (?))
                AND activity IN (SELECT activity FROM {local_booste_suggestions} lbs
                                        LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                        LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                        LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                        WHERE lblf.name = 'modality' AND lbt.booste = (?) ".$activity_time."  AND ext_activity IS NULL GROUP BY activity
                                        
                                INTERSECT
                                
                                SELECT activity FROM {local_booste_suggestions} lbs
                                    LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                    LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                    LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                    WHERE ".$taxonomies." AND lbt.booste = (?) ".$activity_time."  AND ext_activity IS NULL GROUP BY activity

                                INTERSECT  

                                SELECT activity FROM {local_booste_suggestions} lbs
                                    LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                    LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                    LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                    WHERE lblf.name = 'group_size' AND lbt.booste = (?) ".$activity_time."  AND ext_activity IS NULL GROUP BY activity)
                AND lblf.name <> 'discipline'
                AND lbs.ext_activity IS NULL
                GROUP BY activity
                
                UNION ALL 
                
                SELECT lbs.id,activity, ext_activity, SUM(points) as points
                FROM {local_booste_suggestions} lbs 
                LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id
                WHERE lbs.tag IN
                    (SELECT tag
                    FROM
                    {local_booste_tags}
                    WHERE
                    booste = (?))
                AND ext_activity IN (SELECT ext_activity FROM {local_booste_suggestions} lbs
                                            LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                            LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                            LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                            WHERE lblf.name = 'modality' AND lbt.booste = (?) ".$ext_activity_time."  AND activity IS NULL GROUP BY ext_activity
                                            
                                    INTERSECT 
                                
                                    SELECT ext_activity FROM {local_booste_suggestions} lbs
                                        LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                        LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                        LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                        WHERE ".$taxonomies."  AND lbt.booste = (?) ".$ext_activity_time."  AND activity IS NULL GROUP BY ext_activity
                                        
                                    INTERSECT  

                                    SELECT ext_activity FROM {local_booste_suggestions} lbs
                                        LEFT JOIN {local_booste_list_tags} lblt  ON lbs.tag = lblt.id
                                        LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
                                        LEFT JOIN {local_booste_tags} lbt  ON lbt.tag = lblt.id
                                        WHERE lblf.name = 'group_size' AND lbt.booste = (?) ".$ext_activity_time."  AND activity IS NULL GROUP BY ext_activity)
                AND lblf.name <> 'discipline'
                AND lbs.activity IS NULL
                GROUP BY ext_activity";
                
        $list = $DB->get_records_sql($sql, array($booste, $booste, $booste, $booste, $booste, $booste, $booste, $booste, $booste, $booste));

        // $choicegroup_check = $DB->get_field_sql(
        //     'SELECT lblt.name FROM {local_booste_tags} lbt
        //     LEFT JOIN {local_booste_list_tags} lblt  ON lbt.tag = lblt.id
        //     LEFT JOIN {local_booste_list_fields} lblf  ON lblt.field = lblf.id 
        //     WHERE lbt.booste = (?) AND lblt.name IN ("lm_collaborative","teamwork")', array("booste" => $booste));

        // if(!$choicegroup_check) {
        //     $choicegroup = $DB->get_field("modules", "id", array("name" => "choicegroup"));
        //     foreach($list as $key => $r) {
        //         if($r->activity == $choicegroup) {
        //             unset($list[$key]);
        //         }
        //     }
        // }

        return !empty($list) ? $list : [];
    }

    /**
     * Returns description of method result value.
     *
     * @return external_value
     */
    public static function execute_returns() {
        return new external_multiple_structure(
                new external_single_structure([
                        'activity' => new external_value(PARAM_INT, 'Activity id'),
                        'ext_activity' => new external_value(PARAM_INT, 'Activity out of moodle id'),
                        'points' => new external_value(PARAM_INT, 'Sum of activity recommendeds'),
                ])
        );
    }
}
