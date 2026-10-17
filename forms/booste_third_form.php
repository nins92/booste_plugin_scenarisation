<?php

require_once(__DIR__ . '/../../../config.php');
require_once(__DIR__ . '/../classes/form/booste_third_form.php');

use local_booste\booste;

global $PAGE, $USER, $OUTPUT;

$boosteid = required_param('booste', PARAM_INT);
$courseid = required_param('course', PARAM_INT);

$booste = booste::get_record(['id' => $boosteid]);
\local_booste\helper::header($courseid, $boosteid);

$canedit = \local_booste\helper::can_edit_form($boosteid);

$customdata = [
    'persistent' => $booste,
    'userid' => $USER->id,
    'timestamp' => time(),
    'course' => $courseid,
    'booste' => $boosteid
];

$mform = new \local_booste\form\booste_third_form($PAGE->url, $customdata, 'post', '', null, $canedit);

// Annulation.
if ($mform->is_cancelled()) {
    redirect(new moodle_url('/local/booste/index.php', ['course' => $courseid]));
}

// Soumission.
if ($data = $mform->get_data()) {
    if (!empty($data->submitbefore)) {
        redirect(new moodle_url('/local/booste/forms/booste_second_form.php', [
            'booste' => $boosteid,
            'course' => $courseid
        ]));
    } else {
        redirect(new moodle_url('/local/booste/index.php', ['course' => $courseid]));
    }
}

// Affichage.
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_booste'));
echo $OUTPUT->heading(get_string('third_form', 'local_booste'), 3);

// Breadcrumbs.
$links = [
    [
        'url' => new moodle_url('/local/booste/forms/booste_first_form.php', ['booste' => $boosteid, 'course' => $courseid]),
        'text' => get_string('first_form', 'local_booste')
    ],
    [
        'url' => new moodle_url('/local/booste/forms/booste_second_form.php', ['booste' => $boosteid, 'course' => $courseid]),
        'text' => get_string('second_form', 'local_booste')
    ],
    [
        'url' => new moodle_url('/local/booste/forms/booste_third_form.php', ['booste' => $boosteid, 'course' => $courseid]),
        'text' => get_string('third_form', 'local_booste')
    ],
];

foreach ($links as $i => $link) {
    echo html_writer::link($link['url'], $link['text']);
    if ($i < count($links) - 1) {
        echo ' > ';
    }
}

if (!$canedit) {
    echo ' > ' . html_writer::link(
        new moodle_url('/local/booste/index.php', ['course' => $courseid]),
        get_string('return_index', 'local_booste')
    );
}

$mform->display();
echo $OUTPUT->footer();
