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

/**
* Adds or updates modules in a course using new formslib
*
* @package    local_booste
* @author     XXX
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
use local_booste\booste;
use local_booste\helper;

require_once(__DIR__ . '/../../../config.php');

require_once($CFG->libdir.'/filelib.php');
require_once($CFG->libdir.'/gradelib.php');
require_once($CFG->libdir.'/completionlib.php');
require_once($CFG->libdir.'/plagiarismlib.php');
require_once($CFG->dirroot . '/course/modlib.php');

$add               = optional_param('add', '', PARAM_ALPHANUM);     // Module name.
$update            = optional_param('update', 0, PARAM_INT);
$return            = optional_param('return', 0, PARAM_BOOL);    //return to course/view.php if false or mod/modname/view.php if true
$type              = optional_param('type', '', PARAM_ALPHANUM); //TODO: hopefully will be removed in 2.0
$sectionreturn     = optional_param('sr', null, PARAM_INT);
$boosteid          = optional_param('booste',null, PARAM_INT);
$boostestepid      = optional_param('booste_step',null, PARAM_INT);
$courseid          = required_param('course', PARAM_INT);
$archetype         = optional_param('archetype',null, PARAM_INT);
$ext_activity_id   = optional_param('ext_activity',null, PARAM_INT);

$url = new moodle_url('/local/booste/forms/modedit.php');
$url->param('sr', $sectionreturn);
if (!empty($return)) {
    $url->param('return', $return);
}

if (!empty($update)) {

    $url->param('update', $update);
    $PAGE->set_url($url);

    // Select the "Edit settings" from navigation.
    navigation_node::override_active_url(new moodle_url('/local/booste/forms/modedit.php', array('update'=>$update, 'return'=>1)));

    // Check the course exists.
    $course = $DB->get_record('course', array('id'=>$courseid), '*', MUST_EXIST);

    // require_login
    require_login($course); // needed to setup proper $COURSE

    $element = $DB->get_record('local_booste_step_element', array('id'=>$update));
    $moduletype = $DB->get_record('modules', array('id'=>$element->module));

    $boostestep = $DB->get_record('local_booste_step', array('id'=>$boostestepid));
    $firstsection = $DB->get_field('course_sections', 'id', array('course'=>$courseid, 'section'=>0));
    $cm = helper::create_module($element, $moduletype, $course, $firstsection);
    $cm->id = $cm->coursemodule;

    list($cm, $context, $module, $data, $cw) = get_moduleinfo_data($cm, $course);

    $sectionname = get_section_name($course, $cw);
    $fullmodulename = get_string('modulename', $moduletype->name);

    if ($data->section && $course->format != 'site') {
        $heading = new stdClass();
        $heading->what = $fullmodulename;
        $heading->in   = $sectionname;
        $pageheading = get_string('booste_updatingain', 'local_booste', $heading);
    } else {
        $pageheading = get_string('booste_updatinga', 'local_booste', $fullmodulename);
    }
    $navbaraddition = null;

} else if (!empty($add)) {
    $section = required_param('section', PARAM_INT);

    $url->param('course', $courseid);
    $url->param('booste', $boosteid);
    $url->param('booste_step', $boostestepid);
    $url->param('add', $add);
    $url->param('section', $section);

    $PAGE->set_url($url);

    $course = $DB->get_record('course', array('id'=>$courseid), '*', MUST_EXIST);
    require_login($course);

    list($moduletype, $context, $cw, $cm, $data) = prepare_new_moduleinfo_data($course, $add, $section);
    $data->return = 0;
    $data->sr = $sectionreturn;
    $data->add = $add;
    if (!empty($type)) { //TODO: hopefully will be removed in 2.0
        $data->type = $type;
    }

    $sectionname = get_section_name($course, $cw);
    $fullmodulename = get_string('modulename', $moduletype->name);

    if ($data->section && $course->format != 'site') {
        $heading = new stdClass();
        $heading->what = $fullmodulename;
        $heading->to   = $sectionname;
        $pageheading = get_string('booste_addinganewto', 'local_booste', $heading);
    } else {
        $pageheading = get_string('booste_addinganew', 'local_booste', $fullmodulename);
    }
    $navbaraddition = $pageheading;

} else {
    require_login();
    print_error('invalidaction');
}

$pagepath = 'mod-' . $moduletype->name . '-';
if (!empty($type)) { //TODO: hopefully will be removed in 2.0
    $pagepath .= $type;
} else {
    $pagepath .= 'mod';
}
$PAGE->set_pagetype($pagepath);
$PAGE->set_pagelayout('admin');

$modmoodleform = "$CFG->dirroot/mod/$moduletype->name/mod_form.php";
if (file_exists($modmoodleform)) {
    require_once($modmoodleform);
} else {
    print_error('noformdesc');
}

$mformclassname = 'mod_'.$moduletype->name.'_mod_form';
$mform = new $mformclassname($data, $cw->section, $cm, $course);

if($ext_activity_id) {
    $ext_activity = $DB->get_record("local_booste_ext_activities", array("id" => $ext_activity_id));
    $data->name = $ext_activity->name;
    $data->externalurl = $ext_activity->link;
    //$data->introeditor['text'] = $ext_activity->description;
}

$mform->set_data($data);

$urlparams = [
    'course' => $course->id, // We always need the course id.
    'booste' => $boosteid, // Booste id.
];

if ($mform->is_cancelled()) {
    if ($return && !empty($cm->id)) {
        $urlparams['forceview'] = 1; // Stop file downloads in resources.
    } 
    course_delete_module($cm->id, true);
    redirect(new moodle_url('/local/booste/forms/booste_third_form.php', $urlparams, 'booste_bottom_anchor'));
} else if ($fromform = $mform->get_data()) {

    if (!empty($update)) {
        $url = new moodle_url('/local/booste/forms/booste_third_form.php', $urlparams, 'booste_bottom_anchor');
        $fromform->update = 0;

        $fromformdata = htmlspecialchars(json_encode($fromform), ENT_QUOTES, 'UTF-8');

        if(!$fromform->name) {
            $fromform->name = strip_tags($fromform->introeditor['text']);
        }

        $element = \local_booste\element::get_record(array('id'=>$update));
        $element->set('name', $fromform->name);
        $element->set('data', $fromformdata);
        $element->update();

        $booste = \local_booste\booste::get_record(['id' => $boosteid]);
        $booste->set('timestamp', time());
        $booste->update();

        course_delete_module($cm->id, true);

        redirect($url, get_string('saved_element', 'local_booste'), null, \core\output\notification::NOTIFY_SUCCESS);

    } else if (!empty($add)) {

        $fromformdata =  htmlspecialchars(json_encode($fromform), ENT_QUOTES, 'UTF-8');

        if(!isset($fromform->name)) {
            $fromform->name = strip_tags($fromform->introeditor['text']);
        }

        $elementsize = sizeof(\local_booste\element::get_records(array('booste_step'=>$boostestepid)));
        $element = new \local_booste\element(0, (object)[
            "booste_step" => $boostestepid, 
            "module" => (int) $data->module, 
            "element_type" => $fullmodulename, 
            "name" => $fromform->name,
            "idx" => $elementsize+1,
            'data' => $fromformdata,
            'archetype' => $archetype
        ]);
        $element->create();
        $element->save();

        $booste = \local_booste\booste::get_record(['id' => $boosteid]);
        $booste->set('timestamp', time());
        $booste->update();


        //utiliser l'id du module pour récupérer le nom, puis récupérer mformclassname pour créer le mform pour les fcts addmoduleinfo

        $url = new moodle_url('/local/booste/forms/booste_third_form.php', $urlparams, 'booste_bottom_anchor');
        redirect($url, get_string('saved_element', 'local_booste'), null, \core\output\notification::NOTIFY_SUCCESS);
    } else {
        course_delete_module($cm->id, true);
        print_error('invaliddata');
    }

    
} else {
    $protected = \local_booste\helper::access_protected($mform, $boosteid);

    $protected->addElement('hidden', 'booste');
    $protected->setConstant('booste', $boosteid);
    $protected->addElement('hidden', 'booste_step');
    $protected->setConstant('booste_step', $boostestepid);
    $protected->addElement('hidden', 'archetype');
    $protected->setConstant('archetype', $archetype);

    if (!empty($cm->id)) {
        $context = context_module::instance($cm->id);
    } else {
        $context = context_course::instance($course->id);
    }

    if(!empty($update)) {
        $protected->setConstant('update', $update);
        course_delete_module($cm->id, true);
    }

    $moduletype->name = html_entity_decode($moduletype->name);
    $moduletype->name = strip_tags($moduletype->name);

    $streditinga = get_string('booste_editinga', 'local_booste', $fullmodulename);
    $strmodulenameplural = get_string('modulenameplural', $moduletype->name);

    $PAGE->set_heading($course->fullname);
    $PAGE->set_title($streditinga);
    $PAGE->set_cacheable(false);

    if (isset($navbaraddition)) {
        $PAGE->navbar->add($navbaraddition);
    }

    echo $OUTPUT->header();

    if (get_string_manager()->string_exists('modulename_help', $moduletype->name)) {
        echo $OUTPUT->heading_with_help($pageheading, 'modulename', $moduletype->name, 'icon');
    } else {
        echo $OUTPUT->heading_with_help($pageheading, '', $moduletype->name, 'icon');
    }

    $mform->display();
    $PAGE->requires->js_call_amd('local_booste/helper', 'redoActivityButtons', array(get_string('save')));

    echo $OUTPUT->footer();
}
