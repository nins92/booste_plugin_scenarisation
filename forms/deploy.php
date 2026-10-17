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
* Deployement of a scenario into a course process
*
* @package    local_booste
* @author     XXX
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

use local_booste\booste;
use local_booste\helper;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->dirroot. '/course/lib.php');
require_once($CFG->libdir.'/filelib.php');
require_once($CFG->libdir.'/gradelib.php');
require_once($CFG->libdir.'/completionlib.php');
require_once($CFG->libdir.'/plagiarismlib.php');
require_once($CFG->dirroot . '/course/modlib.php');

defined('MOODLE_INTERNAL') || die();

$boosteid     = required_param('boosteid', PARAM_INT);
$courseid     = required_param('courseid', PARAM_INT);
$deploy       = required_param('deploy', PARAM_INT);

global $DB;
global $CFG;

$booste = booste::get_record(['id' => $boosteid]);
$course = $DB->get_record('course', array('id' => $courseid));

$steps = $DB->get_records('local_booste_step', array("booste" => $boosteid));
$objectives = $DB->get_records('local_booste_objective', array("booste" => $boosteid));

$cw = course_create_section($booste->get('course'));  
$ordersectionscount = 1;

list($moduletype, $context, $cw, $cm, $data) = prepare_new_moduleinfo_data($course, "label", $cw->section);

$modmoodleform = "$CFG->dirroot/mod/label/mod_form.php";
if (file_exists($modmoodleform)) {
    require_once($modmoodleform);
} else {
    print_error('noformdesc');
}

$data->section = $cw->section;

$objective_text = get_string("objective_placeholder", "local_booste")."<ul>";
foreach($objectives as $objective) {
    $objective_text .= "<li>".$objective->objective_sentence."</li>";
}
$objective_text .= "</ul>";
$data->introeditor['text'] = $objective_text;
$mformclassname = 'mod_label_mod_form';
$mform = new $mformclassname($data, $cw->section, $cm, $course);

$data->completion = '0';
$data->completionview = '0';

$md = add_moduleinfo($data, $course, $mform);

move_section_to($course, $cw->section, $ordersectionscount);
$DB->update_record('course_sections', array("id" => $cw->id, "name" => get_string('objectives', 'local_booste')), $bulk=false);  

if($deploy == '0') {
    $elements = [];
    foreach($steps as $step) {
        $rec = $DB->get_records_sql("SELECT * FROM {local_booste_step_element} WHERE booste_step = (?) ORDER BY idx", array($step->id));
        $elements = $elements + $rec;
    }
    $cw = course_create_section($courseid);

    foreach($elements as $element) {
        $oldcm = $DB->get_record('modules', array('id' => $element->module));
        helper::create_module($element, $oldcm, $course, $cw->section);
    }
    move_section_to($course, $cw->section, $ordersectionscount+1);
    $DB->update_record('course_sections', array("id" => $cw->id, "name" => get_string('activities')), $bulk=false);
}
else {
    foreach($steps as $step) {
        $ordersectionscount++;
        $elements = $DB->get_records_sql("SELECT * FROM {local_booste_step_element} WHERE booste_step = (?) ORDER BY idx", array($step->id));
        $cw = course_create_section($courseid);
        
        foreach($elements as $element) {
            $oldcm = $DB->get_record('modules', array('id' => $element->module));
            helper::create_module($element, $oldcm, $course, $cw->section);
        }
        move_section_to($course, $cw->section, $ordersectionscount);
        $DB->update_record('course_sections', array("id" => $cw->id, "name" => $step->name), $bulk=false);
    }
}
$booste->set('is_deployed', 1);
$booste->set('timestamp', time());
$booste->update();

redirect(new moodle_url('/course/view.php', array('id' => $courseid)));
