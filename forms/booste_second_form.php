<?php
/**
 * @package    local_booste
 * @author      XXX
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_booste\form\booste_second_form;
use local_booste\helper;
use local_booste\booste;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/formslib.php');

global $DB, $PAGE, $USER, $OUTPUT;

// 1. Parametres et contexte.
$courseid = required_param('course', PARAM_INT);
$boosteid = required_param('booste', PARAM_INT);

helper::header($courseid, $boosteid);

// Recuperation initiale.
$booste = booste::get_record(['id' => $boosteid]);

if (!$booste) {
    print_error('error_booste_not_found', 'local_booste', new moodle_url('/local/booste/index.php', ['course' => $courseid]));
}

$canedit = helper::can_edit_form($boosteid);
$params = ['booste' => $boosteid, 'course' => $courseid];
$customdata = [
    'persistent' => $booste,
    'userid' => $USER->id,
    'timestamp' => time(),
    'course' => $courseid
];

// 2. Initialisation du formulaire.
$mform = new booste_second_form($PAGE->url->out(false), $customdata, 'post', '', null, $canedit);

// 3. Traitement de la soumission.
if ($data = $mform->get_data()) {
    
    // On s'assure que l'objet est bien charge.
    if (!$booste || !($booste instanceof \core\persistent)) {
        $booste = booste::get_record(['id' => $boosteid]);
    }

    if ($booste) {
        $fields = ['challenge', 'learning_mode'];

        // Traitement des modes d'apprentissage.
        $learning_mode_array = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'learning_mode') === 0 && !empty($value)) {
                $learning_mode_array[] = $value;
            }
        }
        
        if (!empty($learning_mode_array)) {
            $data->learning_mode = $learning_mode_array;
        }

        $bid = $booste->get('id');
        $exstobjectives = $DB->get_records('local_booste_objective', array('booste' => $bid));
        
        $booste->set('timestamp', time());
        $booste->set('is_complete', !empty($exstobjectives) ? 1 : 0);
        $booste->update();
    
        helper::delete_booste_tags($bid, $fields);
        helper::create_booste_tags($bid, $data, $fields);

        if (isset($data->submitnext) && $data->submitnext) {     
            if ($booste->get('is_complete') == 1) {
                redirect(new moodle_url('/local/booste/forms/booste_third_form.php', $params));
            } else {
                \core\notification::error(get_string('no_obj', 'local_booste'));
            }
        }

        if (isset($data->submitbefore) && $data->submitbefore) {     
            redirect(new moodle_url('/local/booste/forms/booste_first_form.php', $params));
        }
        
        redirect(new moodle_url('/local/booste/forms/booste_second_form.php', $params), get_string('changessaved', 'core'), 2);
    } else {
        print_error('error_booste_not_found', 'local_booste');
    }

} else if ($mform->is_cancelled()) {
    redirect(new moodle_url('/local/booste/index.php', array('course' => $courseid)));
}

// 4. Affichage.
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_booste'));
echo $OUTPUT->heading(get_string('second_form', 'local_booste'), 3);

$links = [];
$links[] = html_writer::link(new moodle_url('/local/booste/forms/booste_first_form.php', $params), get_string('first_form', 'local_booste'));
$links[] = html_writer::link(new moodle_url('/local/booste/forms/booste_second_form.php', $params), get_string('second_form', 'local_booste'));

if (!$canedit || $booste->get('is_complete') == 1) {
    $links[] = html_writer::link(new moodle_url('/local/booste/forms/booste_third_form.php', $params), get_string('third_form', 'local_booste'));
}
echo implode(' > ', $links);

// 5. JavaScript.
$PAGE->requires->jquery();
$PAGE->requires->js_amd_inline("require(['jquery'], function($) { window.$ = window.jQuery = $; });");

if ($canedit) {
    $PAGE->requires->js_call_amd('local_booste/popup_form', 'init', ['objective', 1]);
    $PAGE->requires->js_call_amd('local_booste/popup_form', 'init', ['evaluation', 1]);
    $PAGE->requires->js_call_amd('local_booste/popup_form', 'init', ['challenge', 1]);
}

// 6. Rendu final.
$mform->display();
echo $OUTPUT->footer();
