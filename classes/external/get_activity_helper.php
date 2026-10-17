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
use core_course\local\entity\lang_string_title;
use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;
use local_booste\element;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class get_activity_helper extends external_api {

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
                'id' => new external_value(PARAM_INT, 'activity ID'),
                'type' => new external_value(PARAM_TEXT, 'activity type'),
        ]);
    }

    /**
     * Returns an activity with its name, informations, tags and fields
     *
     * @param int $id
     * @param string $type
     * @return \stdClass[]
     */
    public static function execute(int $id, string $type): array {
        global $DB;
        $params = external_api::validate_parameters(self::execute_parameters(), [
                'id' => $id,
                'type' => $type,
        ]);

        if($type == "int") {
            $activity = $DB->get_record('modules', array("id" => $id));
            $link = $DB->get_field('local_booste_modules_link', 'link', array("module" => $id));
            if(!$link) {
                $link = "";
            }
            $name = new lang_string_title("modulename", $activity->name);
            $name = $name->get_value();
            $activity_req = "activity";

        }
        else if($type == "ext") {
            $activity = $DB->get_record('local_booste_ext_activities', array("id" => $id));
            $link = $activity->link;
            $name = $activity->name;
            $activity_req = "ext_activity";
        }

        $records = $DB->get_fieldset_sql(
            'SELECT field FROM {local_booste_list_tags} 
            WHERE id IN (SELECT tag FROM {local_booste_suggestions} WHERE '.$activity_req.' = (?)) GROUP BY field', array($id));

        $paramsrequest = "(".str_repeat("?,", sizeof($records));
        $paramsrequest = substr_replace($paramsrequest, ')', -1);

        $fields = $DB->get_records_sql('SELECT id AS field_id, name AS field_name FROM {local_booste_list_fields} WHERE id IN '.$paramsrequest.'AND field_order IS NOT NULL AND name NOT IN ("places","students_specs") ORDER BY field_order', $records);

        foreach($fields as $fkey => $field) {
            $fields[$fkey]->field_name = get_string($field->field_name, "local_booste"); 
            $tags = $DB->get_records_sql(
                    'SELECT id AS tag_id, field, name AS tag_name FROM {local_booste_list_tags} 
                    WHERE field = (?) AND id IN (SELECT tag FROM {local_booste_suggestions} WHERE '.$activity_req.' = (?))', array($fkey, $id));
            foreach($tags as $tkey => $record) {
                $tags[$tkey]->tag_name = get_string($record->tag_name, "local_booste"); 
                $tags[$tkey]->tag_name = str_replace(array('[',']'), '',$tags[$tkey]->tag_name);
            }
            $fields[$fkey]->tags = $tags;
        }


        $structure = array(
            'activity_id' => $id,
            'activity_name' => $name,
            'helper' => $link,
            'helper_label' => get_string("link", "local_booste"),
            'fields' => $fields,
        );

        return $structure;
    }

    /**
     * Returns description of method result value.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
                'activity_id' => new external_value(PARAM_INT, 'Activity id'),
                'activity_name' => new external_value(PARAM_TEXT, 'Activity name'),
                'helper' => new external_value(PARAM_RAW, 'Activity link helper'),
                'helper_label' => new external_value(PARAM_TEXT, 'Activity link helper'),
                'fields' => new external_multiple_structure(
                                new external_single_structure([
                                'field_id' => new external_value(PARAM_INT, 'Field id'),
                                'field_name' => new external_value(PARAM_TEXT, 'Field name'),
                                'tags' => new external_multiple_structure(
                                    new external_single_structure([
                                        'tag_id' => new external_value(PARAM_INT, 'Tag id'),
                                        'field' => new external_value(PARAM_INT, 'Field id'),
                                        'tag_name' => new external_value(PARAM_TEXT, 'Tag name'),
                                    ])
                                )       
                            ])
                ),
        ]);
    }
}
