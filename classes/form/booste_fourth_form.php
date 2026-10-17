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

class booste_fourth_form extends \core_form\dynamic_form  {

    public function definition() {
        global $DB;
        global $USER;

        $mform = $this->_form;
        
        $mform->addElement('hidden', 'booste');
        $mform->setConstant('booste',  $this->_ajaxformdata['booste']);
        $mform->setType('booste', PARAM_INT);

        $deploy_array   = array();
        $deploy_array[] = $mform->createElement('radio', 'deploy', '', get_string('deploy_0', 'local_booste'), 0);
        $deploy_array[] = $mform->createElement('radio', 'deploy', '', get_string('deploy_1', 'local_booste'), 1);
        $mform->addGroup($deploy_array, 'deploy_ar', get_string('deploy_ar', 'local_booste'), array(' '), false);
        $mform->addHelpButton('deploy_ar', 'deploy', 'local_booste');

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
        $mform->addElement('autocomplete', 'course', get_string('deploy_on', 'local_booste'), $courses);
        $mform->setDefault('course', $this->_ajaxformdata['course']);
    }
    
    protected function get_context_for_dynamic_submission(): context {
        $courseid = $this->optional_param('course', 0, PARAM_INT);
        return \context_course::instance($courseid);
    }

    protected function check_access_for_dynamic_submission(): void {
    }

    public function process_dynamic_submission() {
        return $this->get_data();
    }

    public function set_data_for_dynamic_submission(): void {
    }

    protected function get_page_url_for_dynamic_submission(): moodle_url {
        return new moodle_url("/");
    }
}