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
use local_booste\booste;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class booste_duplicate_form extends \core_form\dynamic_form  {

    public function definition() {
        global $DB;
        global $USER;

        $mform = $this->_form;

        $mform->addElement('hidden', 'id');
        $mform->setConstant('id',  $this->_ajaxformdata['id']);
        $mform->setType('id', PARAM_INT);
        
        
        $usercourses = enrol_get_all_users_courses($USER->id);
        foreach($usercourses as $id => $course) {
            $context = \context_course::instance($id);
            if (!has_capability('moodle/course:manageactivities', $context)) {
                unset($usercourses[$id]);
            }
        }
        $courses = [];
        foreach($usercourses as $key => $course) {
            $courses[$key] = $course->fullname;
        }
        $mform->addElement('autocomplete', 'course', get_string('duplicate_on', 'local_booste'), $courses);
        $mform->setDefault('course', $this->_ajaxformdata['course']);

        $lehtml = $mform->addElement('html', '</br></br></br></br></br></br></br></br></br></br>');
    }
    
    protected function get_context_for_dynamic_submission(): context {
        return \context_system::instance();
    }

    protected function check_access_for_dynamic_submission(): void {
    }

    public function process_dynamic_submission() {
        global $DB;
        global $USER;
        global $CFG;
        $data = $this->_ajaxformdata;

        $id = $data['id'];
        $booste = booste::get_record(['id' => $id]);
        $b_objectives = $DB->get_records("local_booste_objective", array("booste" => $id));
        $b_evaluations = $DB->get_records("local_booste_evaluation", array("booste" => $id));
        $b_steps = $DB->get_records("local_booste_step", array("booste" => $id));
        $b_tags = $DB->get_records("local_booste_tags", array("booste" => $id));

        $duplication = new booste(0, (object)[
            'course' => $data['course'],
            'name' => $booste->get('name')." (".get_string('copy').")",
            'privacy' => 1,
            'group_size' => $booste->get('group_size'),
            'description' => $booste->get('description'),
            'is_complete' => $booste->get('is_complete'),
            'created_by' => $USER->id,
            'timestamp' => time()
          ]);
      
        $duplication->create();
        $duplication->save();

        if($b_objectives) {
            foreach($b_objectives as $objective) {
                $objective->booste = $duplication->get('id');
                $DB->insert_record("local_booste_objective", $objective);
            }
        }
        if($b_evaluations) {
            foreach($b_evaluations as $evaluation) {
                $evaluation->booste = $duplication->get('id');
                $DB->insert_record("local_booste_evaluation", $evaluation);
            }
        }
        if($b_steps) {
            foreach($b_steps as $step) {
                $s_elements = $DB->get_records("local_booste_step_element", array("booste_step" => $step->id));
                $step->booste = $duplication->get('id');

                $new_step = $DB->insert_record("local_booste_step", $step);
                
                if($s_elements) {
                    foreach($s_elements as $element) {
                        $element->booste_step = $new_step;
                        $DB->insert_record("local_booste_step_element", $element);
                    }
                }
            }
        }
        if($b_tags) {
            foreach($b_tags as $tag) {
                $tag->booste = $duplication->get('id');
                $DB->insert_record("local_booste_tags", $tag);
            }
        }

        return $CFG->wwwroot."/local/booste/forms/booste_first_form.php?course=".$data['course']."&booste=".$duplication->get('id');
    }

    public function set_data_for_dynamic_submission(): void {
    }

    protected function get_page_url_for_dynamic_submission(): moodle_url {
        return new moodle_url("/");
    }
}