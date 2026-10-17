<?php

namespace local_booste\table;

use moodle_url;
use table_sql;

use local_booste\helper;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once($CFG->libdir . '/tablelib.php');

class boostes extends table_sql {

    /**
     * Constructor
     * @param int $uniqueid all tables have to have a unique id, this is used
     *      as a key when storing table properties like sort order in the session.
     */
    function __construct($uniqueid) {
        global $PAGE;
        parent::__construct($uniqueid);
        // Define the list of columns to show.
        $columns = array('name', 'course', 'discipline', 'description', 'tags', 'created_by', 'timemodified', 'action');
        $this->define_columns($columns);

        // Define the titles of columns to show in header.
        $headers = array(get_string("name"), get_string("course"), get_string("discipline", 'local_booste'), get_string("description"), get_string("tags"), get_string('author', 'local_booste'),get_string("timemodified", "local_booste"),get_string("action"));
        $this->define_headers($headers);


    }


    function col_name($values) {
        // If the data is being downloaded than we don't want to show HTML.
        return $values->name;
    }

    function col_course($values) {
        global $DB;
        if ($this->is_downloading()) {
            return $values->course;
        } else {        
            $course = $DB->get_record('course', array('id' => $values->course), '*', MUST_EXIST);
            return $course->fullname;
        }
    }

    function col_discipline($values) {
        global $DB;
        if ($this->is_downloading()) {
            return;
        } else {     
            $records = $DB->get_records_sql_menu(
                'SELECT id, name FROM {local_booste_list_tags} 
                WHERE id IN (SELECT tag FROM {local_booste_tags} WHERE booste = (?)) AND field IN (SELECT id FROM {local_booste_list_fields} WHERE name = "discipline")', array($values->id));
    
            $tagslist = '';
            foreach($records as $key => $value) {
                $records[$key] = get_string($value, 'local_booste');
                $records[$key] = str_replace(array('[',']'), '',$records[$key]);
                $tagslist .= '<span class="badge badge-info mb-3 mr-1">'.$records[$key].'</span>';
            }   
            return $tagslist;
        }
    }

    


    function col_tags($values) {
        if ($this->is_downloading()) {
            return ;
        } else {
            return helper::render_booste_tags($values->id);
        }
    }

    function col_created_by($values) {
        global $USER;
        global $DB;
        if ($this->is_downloading()) {
            return $values->course;
        } else {        
            $user = $DB->get_record('user', array('id' => $values->created_by), '*', MUST_EXIST);
            if($USER->id == $values->created_by){
                return get_string("you", "local_booste");
            }
            else {
                return $user->firstname." ".$user->lastname;
            }
        }
    }

    function col_timemodified($values) {
        if ($this->is_downloading()) {
            return $values->course;
        } else { 
            return date("d-m-Y", $values->timemodified);      
        }
    }

    function col_action($values) {
        global $USER;
        global $DB;
        global $PAGE;
        $courseid = optional_param('course', 0, PARAM_INT);
        if ($this->is_downloading()) {
            return $values->course;
        } else {        
            $PAGE->requires->js_call_amd('local_booste/popup_form', 'duplicateBooste', array($values->id));
            if($USER->id == $values->created_by || is_siteadmin()){
                $PAGE->requires->js_call_amd('local_booste/delete_data', 'init', 'booste');
                return '<a href="/moodle/local/booste/forms/booste_first_form.php?course='.$values->course.'&booste='.$values->id.'">'.get_string('edit').'</a>  
                <a href="#" name="booste" data-id="'.$values->id.'" data-action="delete">'.get_string('delete').'</a>
                <a href="#" data-id="'.$values->id.'" data-course="'.$values->course.'" data-action="duplicatebooste">'.get_string('duplicate').'</a>';
            }
            else {
                return '<a href="/moodle/local/booste/forms/booste_first_form.php?course='.$courseid.'&booste='.$values->id.'">'.get_string('read', 'local_booste').'</a>
                <a href="#" data-id="'.$values->id.'" data-course="'.$values->course.'" data-action="duplicatebooste">'.get_string('duplicate').'</a>';
            }
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
