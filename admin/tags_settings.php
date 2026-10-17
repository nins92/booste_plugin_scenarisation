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

use local_booste\table\tags;
use local_booste\form\filter_activity_form;

global $CFG;
global $OUTPUT;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once($CFG->libdir . '/tablelib.php');


$table = new tags('uniqueid');
$mform = new filter_activity_form(null, ['type' => "tag"]);
$request = '1=1';
$ext = "";


// Check permissions.
require_login(null, false);
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
admin_externalpage_setup('boosteexternalconfig');

if (!$table->is_downloading()) {
    // Only print headers if not asked to download data
    // Print the page header
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('tags_settings','local_booste'));
    echo html_writer::link(new moodle_url('/local/booste/admin/boostes_settings.php') , get_string('boostes_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "int")) , get_string('activities_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/activities_settings.php', array('type' => "ext")), get_string('ext_activities_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/tags_settings.php') , get_string('tags_settings','local_booste'))." | ";
    echo html_writer::link(new moodle_url('/local/booste/admin/fields_settings.php') , get_string('fields_settings','local_booste'));


    echo "</br></br>".html_writer::link("", get_string('create_tag_button','local_booste'), 
    array("id" => "id_tag", "role" => "button", "href" => "#", "data-action" => "editboostepopup", "data-formname" => "tag", "class" => "btn btn-primary"))."</br></br>";
}


if ($fromform = $mform->get_data()) {

    $request = "";
    if($fromform->custom_tags) {
        $request .= "custom = 1";
    }
    if($fromform->fields) {
        $fields = json_encode($fromform->fields);
        $fields = str_replace("[", "(", $fields);
        $fields = str_replace("]", ")", $fields);
        
        if($fromform->custom_tags) {
            $request .= " AND ";
        }

        $request .= "field IN ".$fields."";
    }
    if($fromform->tags) {
        $tags = json_encode($fromform->tags);
        $tags = str_replace("[", "(", $tags);
        $tags = str_replace("]", ")", $tags);

        if($fromform->fields || $fromform->custom_tags) {
            $request .= " AND ";
        }
        $request .= "id IN ".$tags." ";
    }
    if($fromform->modules) {
        $modules = json_encode($fromform->modules);
        $modules = str_replace("[", "(", $modules);
        $modules = str_replace("]", ")", $modules);

        if($fromform->tags || $fromform->fields || $fromform->custom_tags) {
            $request .= " AND ";
        }
        $request .= "id IN (SELECT tag FROM {local_booste_suggestions} WHERE activity IN ".$modules.")";
    }
    if($fromform->ext_activities) {
        $ext_activities = json_encode($fromform->ext_activities);
        $ext_activities = str_replace("[", "(", $ext_activities);
        $ext_activities = str_replace("]", ")", $ext_activities);

        if($fromform->tags || $fromform->fields || $fromform->activities || $fromform->custom_tags) {
            $request .= " AND ";
        }
        $request .= "id IN (SELECT tag FROM {local_booste_suggestions} WHERE ext_activity IN ".$ext_activities.")";
    }

    if(!$fromform->fields && !$fromform->tags && !$fromform->modules && !$fromform->ext_activities && !$fromform->custom_tags) {
        $request = '1=1';
    }

    $PAGE->set_url('/local/booste/admin/activities_settings.php', array('type' => $fromform->type));
} 

$mform->display();

$table->set_sql('*', "{local_booste_list_tags}", $request);

$table->define_baseurl("$CFG->wwwroot/local/booste/admin/tags_settings.php");

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);


$table->sortable(true, 'uniqueid');
$table->no_sorting('edit');
$table->no_sorting('activities');

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);
$table->out(20, true);

$PAGE->requires->js_call_amd('local_booste/popup_form', 'init', array("tag"));
$PAGE->requires->js_call_amd('local_booste/delete_data', 'init', array("tag"));

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}
