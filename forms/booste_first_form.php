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

use local_booste\form\booste_first_form;
use local_booste\booste;
use local_booste\helper;

require_once(__DIR__ . '/../../../config.php');

global $DB, $PAGE, $USER, $OUTPUT;

$courseid = optional_param('course', 0, PARAM_INT);
$boosteid = optional_param('booste', 0, PARAM_INT);

// Définir l'URL AVANT header() pour éviter les warnings et restaurer la nav latérale.
$PAGE->set_url('/local/booste/forms/booste_first_form.php', array('course' => $courseid, 'booste' => $boosteid));

helper::header($courseid, $boosteid);

if ($boosteid > 0) {
    $booste = booste::get_record(['id' => $boosteid]);
}

$canedit = helper::can_edit_form($boosteid);

$mform = new booste_first_form(null, ['course' => $courseid, 'booste' => $boosteid], 'post', '', null, $canedit);

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/local/booste/index.php', array('course' => $courseid)));
} else if ($fromform = $mform->get_data()) {

    $fields = ['modality', 'course_time', 'formation', 'students_level', 'course_type', 'group_size', 'discipline', 'cycle', 'group_size'];

    if ($boosteid > 0) {
        $booste->set('name', $fromform->name);
        $booste->set('privacy', $fromform->privacy);
        $booste->set('description', $fromform->description);
        $booste->set('group_size', $fromform->group_size);
        $booste->set('timestamp', time());
        $booste->update();

        if ($fromform->discipline) {
            $disciplinefield = $DB->get_field("local_booste_list_fields", "id", array("name" => "discipline"));
            $disciplines = $DB->get_records_menu("local_booste_list_tags", array("field" => $disciplinefield), "", "id, name");
            foreach ($fromform->discipline as $key => $discipline) {
                if (!is_numeric($discipline) && !in_array($discipline, $disciplines)) {
                    $new_discipline = $DB->insert_record('local_booste_list_tags', array("field" => $disciplinefield, "name" => $discipline, "custom" => 1));
                    $fromform->discipline[$key] = $new_discipline;
                }
                if (in_array($discipline, $disciplines)) {
                    $fromform->discipline[$key] = array_search($discipline, $disciplines);
                }
            }
        }

        helper::delete_booste_tags($boosteid, $fields);
        helper::create_booste_tags($booste->get('id'), $fromform, $fields);

        $params = array(
            'booste' => $booste->get('id'),
            'course' => $courseid,
        );

        if (!empty($fromform->submitnext)) {
            redirect(new moodle_url('/local/booste/forms/booste_second_form.php', $params));
        } else {
            // Bouton "Enregistrer" : rester sur le formulaire 1 avec le booste existant.
            redirect(new moodle_url('/local/booste/forms/booste_first_form.php', $params));
        }
    } else {
        $booste = new \local_booste\booste(0, (object)[
            'course' => $PAGE->course->id,
            'name' => $fromform->name,
            'privacy' => $fromform->privacy,
            'group_size' => $fromform->group_size,
            'description' => $fromform->description,
            'created_by' => $USER->id,
            'timestamp' => time()
        ]);

        if ($fromform->discipline) {
            $disciplinefield = $DB->get_field("local_booste_list_fields", "id", array("name" => "discipline"));
            $disciplines = $DB->get_records_menu("local_booste_list_tags", array("field" => $disciplinefield), "", "id, name");
            foreach ($fromform->discipline as $key => $discipline) {
                if (!is_numeric($discipline) && !in_array($discipline, $disciplines)) {
                    $new_discipline = $DB->insert_record('local_booste_list_tags', array("field" => $disciplinefield, "name" => $discipline, "custom" => 1));
                    $fromform->discipline[$key] = $new_discipline;
                }
                if (in_array($discipline, $disciplines)) {
                    $fromform->discipline[$key] = array_search($discipline, $disciplines);
                }
            }
        }

        $booste->create();
        $booste->save();

        helper::create_booste_tags($booste->get('id'), $fromform, $fields);

        $DB->insert_record('local_booste_step', array('booste' => $booste->get('id'), 'name' => 'Etape 1'));

        $params = array(
            'booste' => $booste->get('id'),
            'course' => $courseid,
        );

        if (!empty($fromform->submitnext)) {
            redirect(new moodle_url('/local/booste/forms/booste_second_form.php', $params));
        } else {
            // Bouton "Enregistrer" : afficher le formulaire 1 avec le nouveau booste.
            redirect(new moodle_url('/local/booste/forms/booste_first_form.php', $params));
        }
    }

} else {
    // Affichage initial ou re-affichage après erreur de validation.

    echo $OUTPUT->header();

    echo $OUTPUT->heading(get_string('heading', 'local_booste'));
    echo $OUTPUT->heading(get_string('first_form', 'local_booste'), 3);

    echo html_writer::link(
        new moodle_url('/local/booste/forms/booste_first_form.php', array('booste' => $boosteid, 'course' => $courseid)),
        get_string('first_form', 'local_booste')
    ) . " > ";

    if ($boosteid) {
        echo html_writer::link(
            new moodle_url('/local/booste/forms/booste_second_form.php', array('booste' => $boosteid, 'course' => $courseid)),
            get_string('second_form', 'local_booste')
        ) . " > ";
        if (!$canedit || (isset($booste) && $booste->get('is_complete') == 1)) {
            echo html_writer::link(
                new moodle_url('/local/booste/forms/booste_third_form.php', array('booste' => $boosteid, 'course' => $courseid)),
                get_string('third_form', 'local_booste')
            );
        }
        if (!$canedit) {
            echo " > " . html_writer::link(
                new moodle_url('/local/booste/index.php', array('course' => $courseid)),
                get_string('return_index', 'local_booste')
            );
        }
    }

    // Pré-remplir les données si édition d'un booste existant.
    $toform = new stdClass();
    if ($boosteid > 0 && isset($booste)) {
        $toform->name        = $booste->get('name');
        $toform->privacy     = $booste->get('privacy');
        $toform->description = $booste->get('description');
        $toform->group_size  = $booste->get('group_size');
    }

    $mform->set_data($toform);
    $mform->display();

    echo $OUTPUT->footer();
}
