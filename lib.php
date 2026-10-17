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
 * This function extends the courses navigation with the report items
 *
 * @param global_navigation $nav The navigation node to extend
 */
function local_booste_extend_navigation($nav) {

    global $CFG, $PAGE;

    // Only add this settings item on non-site course pages.
    if (!$PAGE->course or $PAGE->course->id == 1) {
        return;
    }

    // Only let users with the appropriate capability see this settings item.
    if (!has_capability('moodle/backup:backupcourse', context_course::instance($PAGE->course->id))) {
        return;
    }

    $node = navigation_node::create(
        'Booste',
        new moodle_url('/local/booste/index.php', array('course' => $PAGE->course->id)),
        navigation_node::TYPE_CUSTOM
    );
    $node->showinflatnavigation = true;
    $nav->add_node($node);
    return $nav;
}

/**
 * This function extends the settings navigation with the report items
 *
 * @param settings_navigation $settingsnav The navigation node to extend
 * @param context $context The context of the course
 */
function local_booste_extend_settings_navigation($settingsnav, $context) {
    global $CFG, $PAGE;

    // Only add this settings item on non-site course pages.
    if (!$PAGE->course or $PAGE->course->id == 1) {
        return;
    }

    // Only let users with the appropriate capability see this settings item.
    if (!has_capability('moodle/backup:backupcourse', context_course::instance($PAGE->course->id))) {
        return;
    }

    if ($settingnode = $settingsnav->find('courseadmin', navigation_node::TYPE_COURSE)) {
        $strbooste = get_string('booste', 'local_booste');
        $url = new moodle_url('/local/booste/index.php', array('course' => $PAGE->course->id));
        $boostenode = navigation_node::create(
            "Booste",
            $url,
            navigation_node::NODETYPE_LEAF,
            'booste',
            'booste',
            new pix_icon('t/addcontact', $strbooste)
        );
        if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
            $boostenode->make_active();
        }
        $settingnode->add_node($boostenode);
    }
}


function local_booste_output_fragment_new_group_form($args) {
    global $CFG;

    require_once($CFG->dirroot . '/group/group_form.php');
    $args = (object) $args;
    $context = $args->context;

    $formdata = [];
    if (!empty($args->jsonformdata)) {
        $serialiseddata = json_decode($args->jsonformdata);
        parse_str($serialiseddata, $formdata);
    }

    list($ignored, $course) = get_context_info_array($context->id);
    $group = new stdClass();
    $group->courseid = $course->id;

    require_capability('moodle/course:managegroups', $context);
    $editoroptions = [
        'maxfiles' => EDITOR_UNLIMITED_FILES,
        'maxbytes' => $course->maxbytes,
        'trust' => false,
        'context' => $context,
        'noclean' => true,
        'subdirs' => false
    ];
    $group = file_prepare_standard_editor($group, 'description', $editoroptions, $context, 'group', 'description', null);

    $mform = new group_form(null, array('editoroptions' => $editoroptions), 'post', '', null, true, $formdata);
    // Used to set the courseid.
    $mform->set_data($group);

    if (!empty($args->jsonformdata)) {
        // If we were passed non-empty form data we want the mform to call validation functions and show errors.
        $mform->is_validated();
    }

    return $mform->render();
}
