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

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/tablelib.php');

global $USER, $OUTPUT, $PAGE, $DB;

$courseid = optional_param('course', 0, PARAM_INT);
$boosteid = optional_param('booste', 0, PARAM_INT);
$type     = optional_param('type', 'myboostes', PARAM_TEXT);
$download = optional_param('download', '', PARAM_ALPHA); // Correction : variable $download initialisée.

// Définir l'URL AVANT header() pour restaurer la navigation latérale.
$PAGE->set_url('/local/booste/index.php', array('course' => $courseid, 'type' => $type));

\local_booste\helper::header($courseid, $boosteid);

// Initialiser la requête SQL de base.
$request = '';
if ($type == "myboostes") {
    $request = 'created_by = "' . $USER->id . '" ';
} else {
    $request = 'privacy = 0 AND created_by <> ' . $USER->id;
}

$mform = new filter_booste_form(null, ['course' => $courseid, "type" => $type]);

$create_form_link = new moodle_url('/local/booste/forms/booste_first_form.php', array('course' => $courseid));

if ($fromform = $mform->get_data()) {
    $request = '';
    $type = $fromform->type;
    if ($type == "myboostes") {
        $request .= 'created_by = "' . $USER->id . '" ';
    } else {
        $request .= 'privacy = 0 AND created_by <> ' . $USER->id . ' ';
    }

    if (!empty($fromform->disciplines)) {
        $disciplines = json_encode($fromform->disciplines);
        $disciplines = str_replace("[", "(", $disciplines);
        $disciplines = str_replace("]", ")", $disciplines);
        $request .= "AND id IN (SELECT booste FROM {local_booste_tags} WHERE tag IN " . $disciplines . ") ";
    }

    if (!empty($fromform->boostes)) {
        $boostes = json_encode($fromform->boostes);
        $boostes = str_replace("[", "(", $boostes);
        $boostes = str_replace("]", ")", $boostes);
        $request .= "AND id IN " . $boostes . " ";
    }

    if (!empty($fromform->courses)) {
        $courses = json_encode($fromform->courses);
        $courses = str_replace("[", "(", $courses);
        $courses = str_replace("]", ")", $courses);
        $request .= "AND course IN " . $courses . " ";
    }

    if (!empty($fromform->tags)) {
        $tags = json_encode($fromform->tags);
        $tags = str_replace("[", "(", $tags);
        $tags = str_replace("]", ")", $tags);

        $orderids = $DB->get_fieldset_sql("SELECT booste FROM {local_booste_tags} WHERE tag IN " . $tags . " GROUP BY (booste) ORDER BY count(booste) DESC");
        $orderids = json_encode($orderids);
        $orderids = str_replace("[", "", $orderids);
        $orderids = str_replace("]", "", $orderids);

        $request .= "AND id IN (SELECT booste FROM {local_booste_tags} WHERE tag IN " . $tags . ") ORDER BY FIELD(id,$orderids)";
    }
}

// Affichage de la page.
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_booste'));

echo html_writer::link($create_form_link, get_string('create_booste_button', 'local_booste'), array("class" => "btn btn-primary", "role" => "button")) . " ";
echo html_writer::link(new moodle_url('/local/booste/index.php', array('course' => $courseid, 'type' => 'myboostes')), get_string('myboostes', 'local_booste'), array("class" => "btn btn-primary", "role" => "button")) . " ";
echo html_writer::link(new moodle_url('/local/booste/index.php', array('course' => $courseid, 'type' => 'shared')), get_string('shared', 'local_booste'), array("class" => "btn btn-primary", "role" => "button")) . " </br></br></br>";

$mform->display();

$table = new boostes('uniqueid');
$table->define_baseurl(new moodle_url('/local/booste/index.php', array('course' => $courseid, 'type' => $type))); // Correction : baseurl requis.
$table->is_downloading($download, 'booste', 'booste');

$table->set_sql('*', "{local_booste}", $request);
$table->out(10, true);

$PAGE->requires->js_call_amd('local_booste/delete_data', 'init', array('booste'));
echo $OUTPUT->footer();
