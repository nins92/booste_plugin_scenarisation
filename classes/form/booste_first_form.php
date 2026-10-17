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

class booste_first_form extends moodleform {

    public function definition() {

        global $PAGE, $DB, $CFG;

        $mform = $this->_form;
        $courseid = $this->_customdata['course'];
        $boosteid = $this->_customdata['booste'];

        $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);

        $mform->addElement('hidden', 'course');
        $mform->setConstant('course', $course->id);
        $mform->setType('course', PARAM_INT);

        $mform->addElement('hidden', 'booste');
        $mform->setConstant('booste', $boosteid);
        $mform->setType('booste', PARAM_INT);

        $mform->addElement('header', 'header_informations', get_string('header_informations', 'local_booste'));

        $mform->addElement('static', 'course_name', get_string('course'), $course->fullname);

        $mform->addElement('text', 'name', get_string('booste_name', 'local_booste'));
        $mform->setType('name', PARAM_TEXT); // Correction : setType manquant.
        $mform->addHelpButton('name', 'name', 'local_booste');
        $mform->addRule('name', get_string('error'), 'required');

        $privacy_array   = array();
        $privacy_array[] = $mform->createElement('radio', 'privacy', '', get_string('privacy_1', 'local_booste'), 1);
        $privacy_array[] = $mform->createElement('radio', 'privacy', '', get_string('privacy_0', 'local_booste'), 0);
        $mform->addGroup($privacy_array, 'privacy_ar', get_string('privacy_ar', 'local_booste'), array(' '), false);
        // Note : le help button 'privacy' nécessite $string['privacy'] et $string['privacy_title'] dans le fichier lang.
        // Ces clés sont désormais définies dans lang/en/local_booste.php et lang/fr/local_booste.php.
        $mform->addHelpButton('privacy_ar', 'privacy', 'local_booste');
        $mform->setDefault('privacy', 1);

        $disciplines = helper::get_records_from_field("discipline");
        $options = array(
            'tags' => true,
            'multiple' => true,
            'placeholder' => '',
        );
        $select_discipline = $mform->addElement('autocomplete', 'discipline', get_string('discipline', 'local_booste'), $disciplines, $options);
        $mform->addHelpButton('discipline', 'discipline', 'local_booste');

        $course_types = helper::get_records_from_field("course_type");
        $course_type_array   = array();
        foreach ($course_types as $key => $value) {
            $course_type_array[] = $mform->createElement('radio', 'course_type', '', $value, $key);
        }
        $course_type_array[] = $mform->createElement('radio', 'course_type', '', get_string("no_particular_format", "local_booste"), 0);
        $mform->addGroup($course_type_array, 'course_type_ar', get_string('course_type_ar', 'local_booste'), array(' '), false);
        $mform->addHelpButton('course_type_ar', 'course_type', 'local_booste');

        $modalities = helper::get_records_from_field("modality");
        $mform->addElement('select', 'modality', get_string('modality', 'local_booste'), $modalities);
        $mform->addHelpButton('modality', 'modality', 'local_booste');
        $mform->setDefault('modality', $DB->get_field('local_booste_list_tags', 'id', array('name' => 'presential')));

        $times = helper::get_records_from_field("course_time");
        $mform->addElement('select', 'course_time', get_string('course_time', 'local_booste'), $times);
        $mform->addHelpButton('course_time', 'course_time', 'local_booste');

        $mform->addElement('textarea', 'description', get_string("description", "local_booste"), 'wrap="virtual" rows="10" cols="40"');
        $mform->setType('description', PARAM_TEXT);
        $mform->addHelpButton('description', 'description', 'local_booste');

        $mform->addElement('header', 'header_public_concerned', get_string('header_public_concerned', 'local_booste'));

        $formations = helper::get_records_from_field("formation");
        $mform->addElement('select', 'formation', get_string('formation', 'local_booste'), $formations);
        $mform->addHelpButton('formation', 'formation', 'local_booste');

        $students_levels = helper::get_records_from_field("students_level");
        $select_students_level = $mform->addElement('autocomplete', 'students_level', get_string('students_level', 'local_booste'), $students_levels, array('multiple' => true, 'placeholder' => ''));
        $mform->addHelpButton('students_level', 'students_level', 'local_booste');

        $group_size = helper::get_records_from_field("group_size");
        $mform->addElement('select', 'group_size', get_string('group_size', 'local_booste'), $group_size);
        $mform->addHelpButton('group_size', 'group_size', 'local_booste');

        if ($boosteid > 0) {
            $booste = $DB->get_record('local_booste', array('id' => $boosteid), '*', MUST_EXIST);

            $booste_course_type    = helper::get_records_for_edit($boosteid, "course_type");
            $booste_modality       = helper::get_records_for_edit($boosteid, "modality");
            $course_time           = helper::get_records_for_edit($boosteid, "course_time");
            $booste_formation      = helper::get_records_for_edit($boosteid, "formation");
            $booste_students_level = helper::get_records_for_edit($boosteid, "students_level");
            $booste_disciplines    = helper::get_records_for_edit($boosteid, "discipline");
            $booste_group_size     = helper::get_records_for_edit($boosteid, "group_size");

            $mform->setDefault('name', $booste->name);
            $mform->setDefault('privacy', $booste->privacy);
            $mform->setDefault('description', $booste->description);
            $mform->setDefault('group_size', $booste->group_size);
            $mform->setDefault('course_name', $DB->get_field('course', 'fullname', array('id' => $booste->course)));

            $mform->setDefault('course_type', isset($booste_course_type[0]) ? $booste_course_type[0] : null);
            $mform->setDefault('modality', isset($booste_modality[0]) ? $booste_modality[0] : null);
            $mform->setDefault('course_time', isset($course_time[0]) ? $course_time[0] : null);
            $mform->setDefault('formation', isset($booste_formation[0]) ? $booste_formation[0] : null);
            $mform->setDefault('group_size', isset($booste_group_size[0]) ? $booste_group_size[0] : null);

            $select_students_level->setValue($booste_students_level);
            $select_discipline->setValue($booste_disciplines);
        }

        $buttonarray = array();
        $buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('save'));
        if (helper::can_edit_form($boosteid)) {
            $buttonarray[] = $mform->createElement('submit', 'submitnext', get_string('booste_next', 'local_booste'));
        } else {
            $buttonarray[] = $mform->createElement('button', 'button_next', get_string('booste_next', 'local_booste'), array(
                "onclick" => "window.location.href = '" . $CFG->wwwroot . "/local/booste/forms/booste_second_form.php?course=" . $courseid . "&booste=" . $boosteid . "';"
            ));
        }
        $buttonarray[] = $mform->createElement('button', 'return_index', get_string('return_index', 'local_booste'), array(
            "onclick" => "window.location.href = '" . $CFG->wwwroot . "/local/booste/index.php?course=" . $courseid . "';"
        ));
        $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);

        $PAGE->requires->js_call_amd('local_booste/delete_data', 'init', array('booste'));
        $PAGE->requires->string_for_js('all', 'local_booste');
    }

    // Custom validation should be added here.
    function validation($data, $files) {
        return array();
    }
}
