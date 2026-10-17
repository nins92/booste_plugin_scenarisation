<?php

namespace local_booste\table;


use core_course\local\entity\lang_string_title;
use core_table\dynamic;
use moodle_url;
use table_sql;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once($CFG->libdir . '/tablelib.php');

class tags extends table_sql /*implements dynamic*/ {
    
    /**
     * Constructor
     * @param int $uniqueid all tables have to have a unique id, this is used
     *      as a key when storing table properties like sort order in the session.
     */
    function __construct($uniqueid) {
        parent::__construct($uniqueid);
        // Define the list of columns to show.
        $columns = array('name', 'field', 'activities', 'ext_activities', 'action');
        $this->define_columns($columns);

        // Define the titles of columns to show in header.
        $headers = array(get_string("name"), get_string("field", "local_booste"), get_string("activities"), get_string("ext_activities", "local_booste"), get_string("action"));
        $this->define_headers($headers);
    }

    function col_name($values) {
        $name = get_string($values->name, 'local_booste');
        $name = str_replace(array('[',']'), '',$name);

        return $name;
    }

    function col_field($values) {
        global $DB;
        $field = $DB->get_field('local_booste_list_fields', 'name', array('id' => $values->field));
        $name = get_string($field, 'local_booste');

        return $name;
    }

    function col_activities($values) {
        global $DB;
        $activities = $DB->get_records_sql_menu('SELECT id, name FROM {modules} WHERE id IN (SELECT activity FROM {local_booste_suggestions} WHERE tag = (?))', array($values->id));

        foreach($activities as $key => $value) {
            $value = new lang_string_title("modulename", $value);
            $activities[$key] = $value->get_value();
        }

        if ($this->is_downloading()) {
            return ;
        } else {                        
            $activitieslist = '';
            foreach($activities as $activity) {
                $activitieslist .= '<span class="badge badge-info mb-3 mr-1">'.$activity.'</span>';
            }
            return $activitieslist;
        }
    }

    function col_ext_activities($values) {
        global $DB;
        $activities = $DB->get_records_sql_menu('SELECT id, name FROM {local_booste_ext_activities} WHERE id IN (SELECT ext_activity FROM {local_booste_suggestions} WHERE tag = (?))', array($values->id));

        if ($this->is_downloading()) {
            return ;
        } else {                        
            $activitieslist = '';
            foreach($activities as $activity) {
                $activitieslist .= '<span class="badge badge-info mb-3 mr-1">'.$activity.'</span>';
            }
            return $activitieslist;
        }
    }

    function col_action($values) {
        if ($this->is_downloading()) {
            return $values->id;
        } else {
            $buttons = '<a href="#" id="id_tag" name="tag" data-id="'.$values->id.'" data-action="editboostepopup" data-formname="tag">'.get_string('edit').'</a>';
            $buttons .= ' | ';
            $buttons .= '<a href="#" name="tag" data-id="'.$values->id.'" data-action="delete">'.get_string('delete').'</a>';
            return $buttons;
        }
    }
    
    /**
     * Get the context of the current table.
     *
     * Note: This function should not be called until after the filterset has been provided.
     *
     * @return context
     */
    public function get_context(): \context {
        return \context_system::instance();
    }
}
