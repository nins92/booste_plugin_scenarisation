<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 *
 * @package    local_booste
 * @author     XXX
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_booste\table\boostes;
use local_booste\form\filter_booste_form;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir.'/tablelib.php');

global $USER;

$table = new boostes('uniqueid');
$table->is_downloading($download, 'test', 'testing123');

$request .= '1=1 ';

$mform = new filter_booste_form(null, ['course' => $courseid]);

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('boostes_settings','local_booste'));
echo html_writer::link(new moodle_url('/local/booste/admin/boostes_settings.php') , get_string('boostes_settings','local_booste'))." | ";
echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "int")) , get_string('activities_settings','local_booste'))." | ";
echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "ext")), get_string('ext_activities_settings','local_booste'))." | ";
echo html_writer::link(new moodle_url('/local/booste/admin/tags_settings.php') , get_string('tags_settings','local_booste'))." | ";
echo html_writer::link(new moodle_url('/local/booste/admin/fields_settings.php') , get_string('fields_settings','local_booste'));

if ($fromform = $mform->get_data()) {
    $request = '';
    if($fromform->myboostes) {
        $request .= 'created_by = "'.$USER->id.'" ';
    }
    else {
        $request .= '1=1 ';
    }

    if($fromform->disciplines) {
        $disciplines = json_encode($fromform->disciplines);
        $disciplines = str_replace("[", "(", $disciplines);
        $disciplines = str_replace("]", ")", $disciplines);

        $request .= "AND id IN (SELECT booste FROM {local_booste_tags} WHERE tag IN ".$disciplines.") ";
    }
    if($fromform->boostes) {
        $boostes = json_encode($fromform->boostes);
        $boostes = str_replace("[", "(", $boostes);
        $boostes = str_replace("]", ")", $boostes);

        $request .= "AND id IN ".$boostes." ";
    }
    if($fromform->courses) {
        $courses = json_encode($fromform->courses);
        $courses = str_replace("[", "(", $courses);
        $courses = str_replace("]", ")", $courses);

        $request .= "AND course IN ".$courses." ";

    }
    if($fromform->tags) {
        $tags = json_encode($fromform->tags);
        $tags = str_replace("[", "(", $tags);
        $tags = str_replace("]", ")", $tags);

        $orderids = $DB->get_fieldset_sql("SELECT booste FROM {local_booste_tags} WHERE tag IN ".$tags." GROUP BY (booste) ORDER BY count(booste) DESC");
        $orderids = json_encode($orderids);
        $orderids = str_replace("[", "", $orderids);
        $orderids = str_replace("]", "", $orderids);

        $request .= "AND id IN (SELECT booste FROM {local_booste_tags} WHERE tag IN ".$tags.") ORDER BY FIELD(id,$orderids)";

    }
} 

$mform->display();

$table->set_sql('*', "{local_booste}", $request);
$table->out(20, true);

$PAGE->requires->js_call_amd('local_booste/delete_data', 'init', array('booste'));
echo $OUTPUT->footer();
