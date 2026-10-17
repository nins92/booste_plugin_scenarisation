<?php

namespace local_booste\table;


use core_course\local\entity\lang_string_title;
use core_table\dynamic;
use moodle_url;
use table_sql;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once($CFG->libdir . '/tablelib.php');

class activities extends table_sql {
    
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
        $columns = array('name', 'tags', 'edit');
        $this->define_columns($columns);

        // Define the titles of columns to show in header.
        $headers = array(get_string("name"), get_string("tags"), get_string("action"));
        $this->define_headers($headers);
    }


    function col_name($values) {
        // If the data is being downloaded than we don't want to show HTML.
        if ($this->is_downloading()) {
            return $values->name;
        } else {
            $name = new lang_string_title("modulename", $values->name);
            return $name->get_value();
        }
    }

    function col_tags($values) {
        global $DB;
        $activity_tags = $DB->get_records_sql_menu('SELECT id, name FROM {local_booste_list_tags} WHERE id IN (SELECT tag FROM {local_booste_suggestions} WHERE activity = (?))', array($values->id));
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

    function col_edit($values) {
        if ($this->is_downloading()) {
            return $values->id;
        } else {
            return '<a href="#" id="id_activities_tags" name="booste" data-id="'.$values->id.'" data-action="editboostepopup" data-formname="activities_tags">'.get_string('edit').'</a>';
        }
    }

    public function guess_base_url(): void {
        $this->baseurl = new moodle_url('/local/booste/admin/activities_settings.php');
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
