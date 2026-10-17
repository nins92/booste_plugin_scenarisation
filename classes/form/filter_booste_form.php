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
global $CFG;

use moodleform;
use local_booste\helper;

require_once($CFG->libdir.'/formslib.php');

class filter_booste_form extends moodleform {

    public function definition() {

        global $DB;

        $mform = $this->_form;

        $mform->addElement('hidden', 'course');
        $mform->setConstant('course', $this->_customdata['course']);
        $mform->setType('course', PARAM_INT);

        $mform->addElement('hidden', 'type');
        $mform->setConstant('type', $this->_customdata['type']);
        $mform->setType('type', PARAM_TEXT);

        $mform->addElement('header', 'header_filter', get_string('filter'));

        // if($this->_customdata['type'] == "shared") {
        //     $type_array   = array();
        //     $type_array[] = $mform->createElement('radio', 'deployednoyes', '', get_string('deployednoyes_0', 'local_booste'), 0);
        //     $type_array[] = $mform->createElement('radio', 'deployednoyes', '', get_string('deployednoyes_1', 'local_booste'), 1);
        //     $mform->addGroup($type_array, 'deployednoyes_ar', '', array(' '), false);
        //     $mform->addHelpButton('deployednoyes_ar', 'deployednoyes', 'local_booste');
        // }

        $disciplines = $DB->get_records_menu('local_booste_list_tags', array("field" => $DB->get_field('local_booste_list_fields', "id", array("name" => "discipline"))), '', 'id, name');
        $mform->addElement('autocomplete', 'disciplines', get_string('discipline', 'local_booste')."s", $disciplines, array('multiple' => true));

        $boostes = $DB->get_records_menu('local_booste', null, '', 'id, name');
        $mform->addElement('autocomplete', 'boostes', get_string('scenario', 'local_booste')."s", $boostes, array('multiple' => true));

        $courses = $DB->get_records_menu('course', null, '', 'id, fullname');
        $mform->addElement('autocomplete', 'courses', get_string('courses'), $courses, array('multiple' => true));

        $tags = helper::get_tags_with_fields();
        $mform->addElement('autocomplete', 'tags', get_string('tags', 'local_booste'), $tags, array('multiple' => true));

        $mform->setExpanded('header_filter', false);

        $mform->addElement('submit', 'submitbutton', get_string('refresh'));
    }

    //Custom validation should be added here
    function validation($data, $files) {
       return array();
    }
}