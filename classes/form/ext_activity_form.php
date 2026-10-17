<?php

namespace local_booste\form;

use core_course\local\entity\lang_string_title;
use context;
use moodle_url;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class ext_activity_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;

        $mform = $this->_form;
        $activityid = $this->_ajaxformdata['id'];

        $mform->addElement('text', 'name', get_string('name'));
        $mform->addHelpButton('name', 'name', 'local_booste');
        $mform->addRule('name', get_string('error'), 'required');

        $mform->addElement('text', 'link', get_string('link', 'local_booste'));
        $mform->addHelpButton('link', 'link', 'local_booste');

        $mform->addElement('text', 'icon', get_string('icon'));
        $mform->addHelpButton('icon', 'icon', 'local_booste');

        $tags = helper::get_tags_with_fields();

        $select_tags = $mform->addElement('autocomplete', 'tags', get_string('tags', 'local_booste'), $tags, array('multiple' => true));

        if($activityid) {

            $mform->addElement('hidden', 'id');
            $mform->setConstant('id', $activityid);
            $mform->setType('id', PARAM_INT);

            $activity = $DB->get_record('local_booste_ext_activities', array("id" => $activityid));        
            $activity_tags = $DB->get_records_menu('local_booste_suggestions', array("ext_activity" => $activityid));
            $select_tags->setValue($activity_tags);
            $mform->setConstant('name', $activity->name);
            $mform->setConstant('link', $activity->link);
            $mform->setConstant('icon', $activity->icon);
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

            $DB->delete_records("local_booste_suggestions", array('ext_activity' => $data['id']));
            $ext_activity = \local_booste\ext_activity::get_record(['id' => $data['id']]);
            $ext_activity->set('name', $data['name']);
            $ext_activity->set('link', $data['link']);
            $ext_activity->set('icon', $data['icon']);

            $ext_activity->update();
            $id = $data['id'];
        }
        else {
            $ext_activity = new \local_booste\ext_activity(0, (object)[
                    'name' => $data['name'],
                    'link' => $data['link'],
                    'icon' => $data['icon'],
            ]);
            $ext_activity->create();
            $ext_activity->save();
            $id = $ext_activity->get('id');
        }
        foreach($data['tags'] as $tag) {
            $DB->insert_record("local_booste_suggestions", array('tag' => $tag, 'ext_activity' => $id), $returnid=true);
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