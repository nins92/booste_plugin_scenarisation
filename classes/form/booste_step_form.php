<?php

namespace local_booste\form;

use context;
use moodle_url;

defined('MOODLE_INTERNAL') || die();

class booste_step_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;

        $mform = $this->_form;


        $mform->addElement('hidden', 'booste');
        $mform->setConstant('booste', $this->_ajaxformdata['id']);
        $mform->setType('booste', PARAM_INT);

        $mform->addElement('text', 'name', get_string('name'));
        $mform->addRule('name', get_string('error'), 'required');

        if($this->_ajaxformdata['editid'] > 0) {
            $booste_step = \local_booste\booste_step::get_record(['id' => $this->_ajaxformdata['editid']]);
            $mform->addElement('hidden', 'id');
            $mform->setConstant('id', $this->_ajaxformdata['editid']);
            $mform->setType('id', PARAM_INT);
            $mform->setDefault('name', $booste_step->name);
        }

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

        if(isset($data['id']) && $data['id'] > 0) {

            $booste_step = \local_booste\booste_step::get_record(['id' => $data['id']]);
            $booste_step->set('name', $data['name']);

            $booste_step->update();
        }
        else {
            $steps = $DB->count_records('local_booste_step', array('booste' =>  $data['booste']));
            $steps = $steps+1;
            $booste_step = new \local_booste\booste_step(0, (object)[
                    'booste' => $data['booste'],
                    'idx' => $steps,
                    'name' => $data['name']
            ]);
            $booste_step->create();
            $booste_step->save();
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