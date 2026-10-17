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

use local_booste\table\activities;
use local_booste\table\ext_activities;
use local_booste\form\filter_activity_form;

global $CFG;
global $OUTPUT;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once($CFG->libdir . '/tablelib.php');

$type = required_param('type', PARAM_TEXT);

$mform = new filter_activity_form(null, ['type' => $type]);
$request = '1=1';
$ext = "";

if($type == "ext") {
    $table = new ext_activities('uniqueid');
    $ext = "ext_";
    $tablename = "{local_booste_ext_activities}";
    $init = "ext_activity";
}
else if($type == "int") {
    $table = new activities('uniqueid');
    $tablename = "{modules}";
    $init = "activities_tags";
}

// Check permissions.
require_login(null, false);
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
admin_externalpage_setup('boosteexternalconfig');

if (!$table->is_downloading()) {
    // Only print headers if not asked to download data
    // Print the page header
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string($ext.'activities_settings','local_booste'));
    echo html_writer::link(new moodle_url('/local/booste/admin/boostes_settings.php') , get_string('boostes_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "int")) , get_string('activities_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "ext")), get_string('ext_activities_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/tags_settings.php') , get_string('tags_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/fields_settings.php') , get_string('fields_settings','local_booste'));

    if($type == "ext") {
        echo "</br></br>".html_writer::link("", get_string('create_ext_activity_button','local_booste'), 
        array("id" => "id_ext_activity", "role" => "button", "href" => "#", "data-action" => "editboostepopup", "data-formname" => "ext_activity", "class" => "btn btn-primary"))."</br></br>";
    }
}


if ($fromform = $mform->get_data()) {

    $request = "";
    if($fromform->modules) {
        $modules = json_encode($fromform->modules);
        $modules = str_replace("[", "(", $modules);
        $modules = str_replace("]", ")", $modules);

        $request .= "id IN ".$modules." ";
    }
    if($fromform->tags) {
        $tags = json_encode($fromform->tags);
        $tags = str_replace("[", "(", $tags);
        $tags = str_replace("]", ")", $tags);

        $orderids = $DB->get_fieldset_sql("SELECT ".$ext."activity FROM {local_booste_suggestions} WHERE tag IN ".$tags." GROUP BY (".$ext."activity) ORDER BY count(".$ext."activity) DESC");
        $orderids = json_encode($orderids);
        $orderids = str_replace("[", "", $orderids);
        $orderids = str_replace("]", "", $orderids);

        if($fromform->modules) {
            $request .= " AND ";
        }
        if(!$orderids) {
            $orderids = 0;
        }
        $request .= "id IN (SELECT ".$ext."activity FROM {local_booste_suggestions} WHERE tag IN ".$tags.") ORDER BY FIELD(id,$orderids)";
    }

    if(!$fromform->modules && !$fromform->tags) {
        $request = '1=1';
    }

    $PAGE->set_url('/local/booste/admin/activities_settings.php', array('type' => $fromform->type));
} 

$mform->display();

$table->set_sql('*', $tablename, $request);

$table->define_baseurl("$CFG->wwwroot/local/booste/admin/activities_settings.php?type=".$type);

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);


$table->sortable(true, 'uniqueid');
$table->no_sorting('edit');
$table->no_sorting('tags');

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);
$table->out(20, true);

$PAGE->requires->js_call_amd('local_booste/popup_form', 'init', array($init));
$PAGE->requires->js_call_amd('local_booste/delete_data', 'init', array("ext_activity"));

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}
