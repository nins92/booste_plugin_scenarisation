<?php

namespace local_booste\table;


use core_course\local\entity\lang_string_title;
use core_table\dynamic;
use moodle_url;
use table_sql;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once($CFG->libdir . '/tablelib.php');

class ext_activities extends table_sql /*implements dynamic*/ {
    
    /**
     * @var filterset Filterset describing which participants to include.
     */
    protected $filterset;

    /**
     * Constructor
     * @param int $uniqueid all tables have to have a unique id, this is used
     *      as a key when storing table properties like sort order in the session.
     */
    function __construct($uniqueid) {
        parent::__construct($uniqueid);
        // Define the list of columns to show.
        $columns = array('name', 'tags', 'action');
        $this->define_columns($columns);

        // Define the titles of columns to show in header.
        $headers = array(get_string("name"), get_string("tags"), get_string("action"));
        $this->define_headers($headers);


    }


    function col_name($values) {
        return $values->name;
    }

    function col_tags($values) {
        global $DB;
        $activity_tags = $DB->get_records_sql('SELECT id, name FROM {local_booste_list_tags} WHERE id IN (SELECT tag FROM {local_booste_suggestions} WHERE ext_activity = (?))', array($values->id));
        if ($this->is_downloading()) {
            return ;
        } else {                        
            $tagslist = '';
            foreach($activity_tags as $tag) {
                $name = get_string($tag->name, 'local_booste');
                $name = str_replace(array('[',']'), '',$name);
                $tagslist .= '<span class="badge badge-info mb-3 mr-1">'.$name.'</span>';
            }
            return $tagslist;
        }
    }

    function col_action($values) {
        if ($this->is_downloading()) {
            return $values->id;
        } else {
            $buttons = '<a href="#" id="id_ext_activity" name="booste" data-id="'.$values->id.'" data-action="editboostepopup" data-formname="ext_activity">'.get_string('edit').'</a>';
            $buttons .= ' | ';
            $buttons .= '<a href="#" name="ext_activity" data-id="'.$values->id.'" data-action="delete">'.get_string('delete').'</a>';
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
