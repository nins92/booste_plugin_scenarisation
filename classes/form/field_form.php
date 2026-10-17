<?php

namespace local_booste\form;
use core_course\local\entity\lang_string_title;

use context;
use moodle_url;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class field_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;

        $mform = $this->_form;
        $fieldid = $this->_ajaxformdata['id'];


        $mform->addElement('hidden', 'id');
        $mform->setConstant('id', $fieldid);
        $mform->setType('id', PARAM_INT);

        $field = $DB->get_record("local_booste_list_fields", array("id" => $fieldid));

        $mform->addElement('static', 'name', get_string('name'), get_string($field->name, 'local_booste'));

        $mform->addElement('float', 'points', get_string('points', 'local_booste'));
        $mform->addHelpButton('points', 'points', 'local_booste');

        // $mform->addElement('textarea', 'helper', get_string('helper', 'local_booste'));
        // $mform->addHelpButton('helper', 'helper', 'local_booste');

        // if($field->helper) {
        //     $mform->setDefault('helper', $field->helper);      
        // }
        // else {   
        //     $mform->setDefault('helper', get_string($field->name."_help", "local_booste"));  
        // }

        $tags = helper::get_tags_with_fields();
        $select_tags = $mform->addElement('autocomplete', 'tags', get_string("tags", "local_booste"), $tags, array('multiple' => true));

        $mform->setDefault('points', $field->points);       
        $field_tags = helper::get_records_from_field($field->name);
        
        $select_tags->setValue(array_keys($field_tags));

        $lehtml = $mform->addElement('html', '</br></br></br></br></br></br></br></br></br></br>');

    }

    protected function get_context_for_dynamic_submission(): context {
        return \context_system::instance();
    }

    protected function check_access_for_dynamic_submission(): void {
        // TODO: Implement check_access_for_dynamic_submission() method.
    }

    public function process_dynamic_submission() {
        global $DB;
        $data = $this->get_data();

        $DB->update_record('local_booste_list_fields', array("id" => $data->id, "points" => $data->points, "helper" => $data->helper));

        $actual_tags = array_keys(helper::get_records_from_field($data->name));
        foreach(array_diff($actual_tags, $data->tags) as $diff) {
            $DB->update_record('local_booste_list_tags', array("id" => $diff, "field" => 0));
        }
        foreach($data->tags as $tag) {
            $DB->update_record('local_booste_list_tags', array("id" => $tag, "field" => $data->id));
        }

        return $data;
    }

    public function set_data_for_dynamic_submission(): void {
        // TODO: Implement set_data_for_dynamic_submission() method.
    }

    protected function get_page_url_for_dynamic_submission(): moodle_url {
                return new moodle_url('/');
    }
}