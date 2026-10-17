<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_booste\form;

use context;
use moodle_url;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class evaluation_form extends \core_form\dynamic_form {

    public function definition() {

        global $DB;
        global $PAGE;

        $mform = $this->_form;

        $mform->addElement('hidden', 'booste');
        $mform->setConstant('booste',  $this->_ajaxformdata['id']);
        $mform->setType('booste', PARAM_INT);

        $eval_types = helper::get_records_from_field("eval_type");
        $select_eval_type = $mform->addElement('select', 'evaluation_type', get_string('eval_type', 'local_booste'), $eval_types);
        $mform->addHelpButton('evaluation_type', 'evaluation_type', 'local_booste');
       
        $mform->addElement('textarea', 'description', get_string("eval_description", "local_booste"), 'wrap="virtual" rows="10" cols="40"');
        $mform->addHelpButton('description', 'eval_description', 'local_booste');
        $mform->addRule('description', get_string('error'), 'required');

        if($this->_ajaxformdata['editid'] > 0) {
            $evaluation = $DB->get_record('local_booste_evaluation', array("id" => $this->_ajaxformdata['editid']));
            $mform->addElement('hidden', 'id');
            $this->set_data($evaluation);
        }

    }

    protected function get_context_for_dynamic_submission(): context {
        return \context_system::instance();
    }

    protected function check_access_for_dynamic_submission(): void {
        // TODO: Implement check_access_for_dynamic_submission() method.
    }

    public function process_dynamic_submission() {
        $data = $this->_ajaxformdata;

        if(isset($data['id'] ) && $data['id'] > 0) {

            $evaluation = \local_booste\evaluation::get_record(['id' => $data['id']]);
            $evaluation->set('evaluation_type', $data['evaluation_type']);
            $evaluation->set('description', $data['description']);

            $evaluation->update();
        }
        else {
            $evaluation = new \local_booste\evaluation(0, (object)[
                    'booste' => $data['booste'],
                    'evaluation_type' => $data['evaluation_type'],
                    'description' => $data['description'],
            ]);
            $evaluation->create();
            $evaluation->save();
            return $data;
        }
    }

    public function set_data_for_dynamic_submission(): void {
        // TODO: Implement set_data_for_dynamic_submission() method.
    }

    protected function get_page_url_for_dynamic_submission(): moodle_url {
                return new moodle_url('/');
    }
}