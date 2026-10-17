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

use local_booste\table\fields;
use local_booste\form\filter_activity_form;

global $CFG;
global $OUTPUT;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once($CFG->libdir . '/tablelib.php');

$table = new fields('uniqueid');

$mform = new filter_activity_form(null, ['type' => 'field']);
$request = '1=1';


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
}


if ($fromform = $mform->get_data()) {

    $request = "";
    if($fromform->fields) {
        $fields = json_encode($fromform->fields);
        $fields = str_replace("[", "(", $fields);
        $fields = str_replace("]", ")", $fields);
        
        if($fromform->custom_tags) {
            $request .= " AND ";
        }

        $request .= "id IN ".$fields."";
    }
    else {
        $request = '1=1';
    }

    $PAGE->set_url('/local/booste/admin/fields_settings.php', array('type' => $fromform->type));
} 

$mform->display();

$table->set_sql('*', "{local_booste_list_fields}", $request);

$table->define_baseurl("$CFG->wwwroot/local/booste/admin/fields_settings.php");

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);


$table->sortable(true, 'uniqueid');

echo html_writer::div('', 'd-flex justify-content-end', [
        'data-region' => 'wrapper',
        'data-table-uniqueid' => $table->uniqueid,
]);
$table->out(20, true);

$PAGE->requires->js_call_amd('local_booste/popup_form', 'init', array("field"));

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}
