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
use core_course\local\entity\lang_string_title;
use local_booste\helper;

require_once($CFG->libdir.'/formslib.php');

class filter_activity_form extends moodleform {

    public function definition() {

        global $DB;

        $mform = $this->_form;

        $mform->addElement('hidden', 'type');
        $mform->setConstant('type', $this->_customdata['type']);
        $mform->setType('type', PARAM_TEXT);

        $mform->addElement('header', 'header_filter', get_string('filter'));

        switch($this->_customdata['type']) {
            case 'int':
                $modules = $DB->get_records_menu('modules', null, '', 'id, name');
                foreach($modules as $key => $value) {
                    $name = new lang_string_title("modulename", $value);
                    $modules[$key] = $name->get_value();
                }
                break;
            case 'ext':
                $modules = $DB->get_records_menu('local_booste_ext_activities', null, '', 'id, name');
                break;
            case 'tag':
                $mform->addElement('checkbox', 'custom_tags', get_string('custom_tags', 'local_booste'));

                $fields = $DB->get_records_menu('local_booste_list_fields', null, '', 'id, name');
                foreach($fields as $key => $value) {
                    $fields[$key] = get_string($value, 'local_booste');
                }
                $mform->addElement('autocomplete', 'fields', get_string('fields', 'local_booste'), $fields, array('multiple' => true));

                $modules = $DB->get_records_menu('modules', null, '', 'id, name');
                foreach($modules as $key => $value) {
                    $name = new lang_string_title("modulename", $value);
                    $modules[$key] = $name->get_value();
                }
                $ext_activities = $DB->get_records_menu('local_booste_ext_activities', null, '', 'id, name');
                $mform->addElement('autocomplete', 'ext_activities', get_string('ext_activities', 'local_booste'), $ext_activities, array('multiple' => true));
                break;
            case 'field':
                $fields = $DB->get_records_menu('local_booste_list_fields', null, '', 'id, name');
                foreach($fields as $key => $value) {
                    $fields[$key] = get_string($value, 'local_booste');
                }
                $mform->addElement('autocomplete', 'fields', get_string('fields', 'local_booste'), $fields, array('multiple' => true));
                break;
            default:
                break;
        }
        
        if($this->_customdata['type'] != "field") {
            $mform->addElement('autocomplete', 'modules', get_string('activities'), $modules, array('multiple' => true));
            
            $tags = helper::get_tags();
            $mform->addElement('autocomplete', 'tags', get_string('tags', 'local_booste'), $tags, array('multiple' => true));
        }


        $mform->setExpanded('header_filter', false);

        $mform->addElement('submit', 'submitbutton', get_string('refresh'));
    }

    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}