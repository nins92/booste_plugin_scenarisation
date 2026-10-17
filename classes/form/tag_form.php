<?php

namespace local_booste\form;

use core_course\local\entity\lang_string_title;
use context;
use moodle_url;

defined('MOODLE_INTERNAL') || die();

class tag_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;

        $mform = $this->_form;
        $tagid = $this->_ajaxformdata['id'];
        
        $mform->addElement('text', 'name', get_string('name'));
        $mform->addHelpButton('name', 'name', 'local_booste');
        
        $fields = $DB->get_records_sql_menu('SELECT * FROM {local_booste_list_fields} WHERE name NOT IN("taxonomy")');
        foreach($fields as $key => $field) {
            $fields[$key] = get_string($field, 'local_booste');
        }
        $mform->addElement('select', 'field', get_string('field', 'local_booste'), $fields);

        $activities = $DB->get_records_menu('modules', null, '', "id, name");
        foreach($activities as $key => $activity) {
            $activity = new lang_string_title("modulename", $activity);
            $activities[$key] = $activity->get_value();
        }
        $select_activities = $mform->addElement('autocomplete', 'activities', get_string('activities'), $activities, array('multiple' => true));

        $ext_activities = $DB->get_records_menu('local_booste_ext_activities', null, '', "id, name");
        $select_ext_activities = $mform->addElement('autocomplete', 'ext_activities', get_string('ext_activities', 'local_booste'), $ext_activities, array('multiple' => true));

        if($tagid && $tagid != "undefined") {

            $mform->addElement('hidden', 'id');
            $mform->setConstant('id', $tagid);
            $mform->setType('id', PARAM_INT);

            $tag = $DB->get_record('local_booste_list_tags', array("id" => $tagid));  
            
            $mform->addElement('hidden', 'custom');
            $mform->setConstant('custom', $tag->custom);
            $mform->setType('custom', PARAM_INT);

            $tag_activities = $DB->get_records_menu('local_booste_suggestions', array("tag" => $tagid), '', 'id, activity');
            $tag_ext_activities = $DB->get_records_menu('local_booste_suggestions', array("tag" => $tagid), '', 'id, ext_activity');
            $select_activities->setValue($tag_activities);
            $select_ext_activities->setValue($tag_ext_activities);

            $name = get_string($tag->name, 'local_booste');
            $name = str_replace(array('[',']'), '', $name);

            $mform->setConstant('name', $name);
            $mform->setConstant('field', $tag->field);

            $mform->disabledIf('name', 'custom', 'eq', 0);
            $mform->disabledIf('field', 'custom', 'eq', 0);

        }
        else {
            $mform->addRule('name', get_string('error'), 'required');
        }

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
        $data = $this->_ajaxformdata;

        if(isset($data['id'] ) && $data['id'] > 0) {

            $DB->delete_records("local_booste_suggestions", array('tag' => $data['id']));

            if($data['custom'] == 1) {
                $tag = \local_booste\tag::get_record(['id' => $data['id']]);
                $tag->set('name', $data['name']);
                $tag->set('field', $data['field']);
    
                $tag->update();
                $id = $data['id'];
            }
        }
        else {
            $tag = new \local_booste\tag(0, (object)[
                'name' => $data['name'],
                'field' => $data['field'],
                'custom' => 1,
            ]);

            $tag->create();
            $tag->save();

            $id = $tag->get('id');
        }

        foreach($data['activities'] as $activity) {
            $DB->insert_record("local_booste_suggestions", array('tag' => $id, 'activity' => $activity), $returnid=true);
        }

        foreach($data['ext_activities'] as $activity) {
            $DB->insert_record("local_booste_suggestions", array('tag' => $id, 'ext_activity' => $activity), $returnid=true);
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