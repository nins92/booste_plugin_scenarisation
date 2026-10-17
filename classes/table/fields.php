<?php

namespace local_booste\table;


use core_course\local\entity\lang_string_title;
use core_table\dynamic;
use moodle_url;
use table_sql;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once($CFG->libdir . '/tablelib.php');

class fields extends table_sql /*implements dynamic*/ {
    
    /**
     * Constructor
     * @param int $uniqueid all tables have to have a unique id, this is used
     *      as a key when storing table properties like sort order in the session.
     */
    function __construct($uniqueid) {
        parent::__construct($uniqueid);
        // Define the list of columns to show.
        $columns = array('name', 'tags', 'points', 'action');
        $this->define_columns($columns);

        // Define the titles of columns to show in header.
        $headers = array(get_string("name"), get_string("tag", "local_booste"), get_string("points", "local_booste"), get_string("action"));
        $this->define_headers($headers);
    }

    function col_name($values) {
        $name = get_string($values->name, 'local_booste');
        $name = str_replace(array('[',']'), '',$name);

        return $name;
    }

    function col_tags($values) {
        global $DB;
        $activity_tags = $DB->get_records_sql_menu('SELECT id, name FROM {local_booste_list_tags} WHERE field = (?)', array($values->id));
        if ($this->is_downloading()) {
            return ;
        } else {                
            $tagslist = '';
            foreach($activity_tags as $tag) {
                $name = get_string($tag, 'local_booste');
                $name = str_replace(array('[',']'), '',$name);
                $tagslist .= '<span class="badge badge-info mb-3 mr-1">'.$name.'</span>';
            }
            return $tagslist;
        }
    }

    function col_points($values) {
        return $values->points;
    }

    function col_action($values) {
        if ($this->is_downloading()) {
            return $values->id;
        } else {
            $button = '<a href="#" id="id_field" name="field" data-id="'.$values->id.'" data-action="editboostepopup" data-formname="field">'.get_string('edit').'</a>';
            return $button;
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
