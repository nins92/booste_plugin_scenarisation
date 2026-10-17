<?php

namespace local_booste\form;
use core_course\local\entity\lang_string_title;

use context;
use moodle_url;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class activities_tags_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;

        $mform = $this->_form;
        $activityid = $this->_ajaxformdata['id'];


        $mform->addElement('hidden', 'id');
        $mform->setConstant('id', $activityid);
        $mform->setType('id', PARAM_INT);

        $activity = $DB->get_record('modules', array("id" => $activityid));
        $tags = helper::get_tags_with_fields();
        $name = new lang_string_title("modulename", $activity->name);
        $select_tags = $mform->addElement('autocomplete', 'tags', $name->get_value(), $tags, array('multiple' => true));

        $mform->addElement('text', 'link', get_string('link', 'local_booste'));
        $mform->addHelpButton('link', 'link', 'local_booste');

        $activity_tags = $DB->get_records_menu('local_booste_suggestions', array("activity" => $activityid));
        $select_tags->setValue($activity_tags);

        $module_link = $DB->get_record('local_booste_modules_link', array("module" => $activityid));
        $mform->setDefault('link', $module_link->link);

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

        $DB->delete_records("local_booste_suggestions", array('activity' => $data->id));
        foreach($data->tags as $tag) {
            $DB->insert_record("local_booste_suggestions", array('tag' => $tag, 'activity' => $data->id), $returnid=true);
        }
        if($data->link) {
            $DB->insert_record("local_booste_modules_link", array('module' => $data->id, 'link' => $data->link), $returnid=true);
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