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
namespace local_booste;

use context_course;
use moodle_exception;

/**
 * Helper Main class (Lib of php funcs for booste)
 *
 * @package    local_booste
 * @copyright  XXX
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class helper {

    /**
     * Header for main forms.
     *
     * @param int $courseid
     * @param int $boosteid
     * @return array[]
     */
    static function header($courseid, $boosteid) {

        global $PAGE, $DB;

        $context = \context_course::instance($courseid);
        if (!has_capability('moodle/course:manageactivities', $context)) {
            throw new moodle_exception(get_string('no_access_to_booste', 'local_booste'));
        }
        if (!$courseid && !$boosteid) {
            throw new moodle_exception('noid');
        }
        if (!$courseid) {
            $booste = \local_booste\booste::get_record(['id' => $boosteid]);
            $courseid = $booste->get('course');
        }
        $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
        require_course_login($course);

        $coursecontext = context_course::instance($course->id);

        $PAGE->set_course($course);
        $PAGE->set_context($coursecontext);
        $PAGE->set_title(format_string($course->fullname));
        $PAGE->set_heading(format_string($course->fullname));
        $PAGE->set_pagelayout('incourse');

        return ["course" => $courseid, "booste" => $boosteid];
    }

    /**
     * Access to protected functions.
     *
     * @param \stdClass $form
     * @param int $boosteid
     * @return \stdClass
     */
    static function access_protected(&$form, $boosteid)
    {
        $reflection = new \ReflectionClass($form);
        $property = $reflection->getProperty("_form");
        $property->setAccessible(true);
        return $property->getValue($form);
    }

    /**
     * Check if user can edit forms.
     *
     * @param int $boosteid
     * @return bool
     */
    static function can_edit_form($boosteid) {
        global $USER, $DB;

        if ($boosteid) {
            $booste = $DB->get_record('local_booste', array('id' => $boosteid), '*', MUST_EXIST);
            if ($USER->id == $booste->created_by || is_siteadmin()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Get tags of a certain field.
     *
     * @param string $field
     * @return array[]
     */
    public static function get_records_from_field($field) {
        global $DB;
        $field_order = '';
        switch ($field) {
            case "course_time":
                $field_order = "ORDER BY FIELD(name, 'course_under_60_mn', 'course_between_1h_and_1h30', 'course_between_1h_and_2h', 'course_over_2h')";
                break;
            case "taxonomy":
                $field_order = "ORDER BY FIELD(name, 'knowledge', 'comprehension', 'application', 'analysis', 'evaluation', 'synthesis')";
                break;
        }

        $records = $DB->get_records_sql_menu(
            'SELECT id, name 
             FROM {local_booste_list_tags} 
             WHERE field = (SELECT id FROM {local_booste_list_fields} WHERE name = (?)) ' . $field_order,
            [$field]
        );

        foreach ($records as $key => $value) {
            if (!empty($value) && get_string_manager()->string_exists($value, 'local_booste')) {
                $label = get_string($value, 'local_booste');
            } else {
                $label = !empty($value) ? $value : '[clé manquante]';
            }
            $label = str_replace(['[', ']'], '', $label);
            $records[$key] = $label;
        }

        return $records;
    }

    /**
     * Get tags from a booste of a certain field.
     *
     * @param int $boosteid
     * @param string $field
     * @return array
     */
    public static function get_records_for_edit($boosteid, $field) {
        global $DB;

        $records = $DB->get_fieldset_sql(
            'SELECT id FROM {local_booste_list_tags} 
             WHERE field = (SELECT id FROM {local_booste_list_fields} WHERE name = (?))
               AND id IN (SELECT tag FROM {local_booste_tags} WHERE booste = (?))',
            array($field, $boosteid)
        );

        return $records;
    }

    /**
     * Associate tags with a booste with fields parametered.
     *
     * @param int $boosteid
     * @param object $fromform
     * @param array $fields
     */
    static function create_booste_tags($boosteid, $fromform, $fields) {
        global $DB;

        foreach ($fields as $field) {
            if (isset($fromform->$field)) {
                if (is_array($fromform->$field)) {
                    foreach ($fromform->$field as $second_field) {
                        if ($second_field && $second_field != "0") {
                            $DB->insert_record("local_booste_tags", array('booste' => $boosteid, 'tag' => $second_field));
                        }
                    }
                } else {
                    if ($fromform->$field && $fromform->$field != "0") {
                        $DB->insert_record('local_booste_tags', array('booste' => $boosteid, 'tag' => $fromform->$field));
                    }
                }
            }
        }
    }

    /**
     * Delete tags of a booste with fields parametered.
     *
     * @param int $boosteid
     * @param array $fields
     */
    static function delete_booste_tags($boosteid, $fields) {
        global $DB;
        $fields_request = '(';
        foreach ($fields as $field) {
            $fields_request .= "?,";
        }
        $fields_request = substr_replace($fields_request, ')', -1);
        array_unshift($fields, $boosteid);
        $DB->execute(
            "DELETE from {local_booste_tags} WHERE booste = (?) AND tag IN 
            (SELECT id FROM {local_booste_list_tags} WHERE field IN 
            (SELECT id FROM {local_booste_list_fields} WHERE name IN $fields_request)) AND is_taxonomy IS NULL", $fields);
    }

    /**
     * Get tags.
     *
     * @return array[]
     */
    static function get_tags() {
        global $DB;
        $tags = $DB->get_records_menu('local_booste_list_tags', null, '', "id, name");
        foreach ($tags as $key => $tag) {
            $tags[$key] = get_string($tag, 'local_booste');
            $tags[$key] = str_replace(array('[', ']'), '', $tags[$key]);
        }
        return $tags;
    }

    /**
     * Get tags with fields.
     *
     * @return array[]
     */
    static function get_tags_with_fields() {
        global $DB;
        $tag_records = $DB->get_records_sql("SELECT lblt.id AS id, lblf.name AS fieldname, lblt.name AS tagname 
                                    FROM {local_booste_list_tags} lblt
                                    LEFT JOIN {local_booste_list_fields} lblf ON lblt.field = lblf.id");
        $tags = [];
        foreach ($tag_records as $record) {
            if (!empty($record->tagname) && get_string_manager()->string_exists($record->tagname, 'local_booste')) {
                $record->tagname = get_string($record->tagname, 'local_booste');
            } else {
                $record->tagname = $record->tagname ?: '[tagname non défini]';
            }
            $record->tagname = str_replace(['[', ']'], '', $record->tagname);

            if (!empty($record->fieldname) && get_string_manager()->string_exists($record->fieldname, 'local_booste')) {
                $record->fieldname = get_string($record->fieldname, 'local_booste');
            } else if (!empty($record->fieldname)) {
                $record->fieldname = "[{$record->fieldname}]";
            }

            if (!empty($record->fieldname)) {
                $tags[$record->id] = $record->fieldname . " : " . $record->tagname;
            } else {
                $tags[$record->id] = $record->tagname;
            }
        }

        asort($tags);
        return $tags;
    }

    /**
     * Get booste tags.
     *
     * @param int $boosteid
     * @return array[]
     */
    public static function get_booste_tags($boosteid) {
        global $DB;

        $records = $DB->get_records_sql_menu(
            'SELECT lblt.id, CONCAT(lblf.name,"&:",lblt.name) AS tag_name
             FROM {local_booste_list_tags} lblt
             LEFT JOIN {local_booste_list_fields} lblf ON lblf.id = lblt.field
             WHERE lblf.name <> "discipline"
               AND lblt.id IN (SELECT tag FROM {local_booste_tags} WHERE booste = (?))',
            [$boosteid]
        );

        $tags = array();
        foreach ($records as $key => $value) {
            $tstring = explode("&:", $value);
            $fieldname = $tstring[0] ?? '';
            $tagname   = $tstring[1] ?? '';

            // On garde la clé brute (ex. "knowledge") avant traduction : c'est elle qui
            // permet d'associer une couleur de taxonomie au badge, la version traduite
            // ("Mémoriser") ne pouvant plus être reliée à sa couleur de façon fiable.
            $istaxonomy = ($fieldname === 'taxonomy');
            $taxonomykey = $istaxonomy ? $tagname : null;

            if (!empty($fieldname) && get_string_manager()->string_exists($fieldname, 'local_booste')) {
                $fieldname = get_string($fieldname, 'local_booste');
            }
            if (!empty($tagname) && get_string_manager()->string_exists($tagname, 'local_booste')) {
                $tagname = get_string($tagname, 'local_booste');
            }

            $label = trim($fieldname . " : " . $tagname, " :");
            $label = str_replace(['[', ']'], '', $label);

            $tags[$key] = array('label' => $label, 'taxonomy' => $taxonomykey);
        }

        return $tags;
    }

    /**
     * Couleurs de taxonomie : mêmes valeurs RGB que le graphique de taxonomie
     * (buildChartData() dans activity_form.js) et que les boutons de filtre
     * (booste_third_form.php), pour que badges, boutons et graphique restent
     * visuellement cohérents partout dans le plugin.
     *
     * @param string $taxonomy
     * @return array|null ['bg' => 'rgb(...)', 'color' => '#...'] ou null si non reconnu.
     */
    public static function get_taxonomy_color($taxonomy) {
        $colors = array(
            'knowledge'     => array('bg' => 'rgb(240, 207, 78)', 'color' => '#212529'),
            'comprehension' => array('bg' => 'rgb(140, 93, 217)', 'color' => '#fff'),
            'application'   => array('bg' => 'rgb(255, 140, 63)', 'color' => '#212529'),
            'analysis'      => array('bg' => 'rgb(175, 220, 253)', 'color' => '#212529'),
            'evaluation'    => array('bg' => 'rgb(202, 49, 32)', 'color' => '#fff'),
            'synthesis'     => array('bg' => 'rgb(204, 190, 170)', 'color' => '#212529'),
        );

        return $colors[$taxonomy] ?? null;
    }

    /**
     * Construit le HTML des badges de tags d'un booste : taille de police légèrement
     * augmentée (+1pt) pour tous, et couleur de taxonomie (identique aux boutons de
     * filtre et au graphique) pour les tags "Taxonomie de Bloom : ...".
     *
     * @param int $boosteid
     * @return string
     */
    public static function render_booste_tags($boosteid) {
        $tags = self::get_booste_tags($boosteid);

        $html = '';
        foreach ($tags as $tag) {
            $style = 'font-size: calc(75% + 1pt);';
            $color = self::get_taxonomy_color($tag['taxonomy']);
            $class = 'badge badge-info mb-3 mr-1';

            if ($color) {
                // On retire "badge-info" pour ne pas hériter du bleu/teal par défaut :
                // la couleur de taxonomie est posée explicitement en style inline.
                $class = 'badge mb-3 mr-1';
                $style .= ' background-color: ' . $color['bg'] . '; color: ' . $color['color'] . ';';
            }

            $html .= '<span class="' . $class . '" style="' . $style . '">' . s($tag['label']) . '</span>';
        }

        return $html;
    }

    /**
     * Calculate tags points from the scenario to get its total points.
     *
     * @param int $boosteid
     * @param string $taxonomy
     * @return int
     */
    static function get_booste_points($boosteid, $taxonomy) {
        global $DB;

        if ($taxonomy == "all") {
            $taxonomies = "";
        } else {
            $taxonomies = "AND lblt.name NOT IN ('evaluation', 'synthesis', 'analysis', 'application', 'comprehension', 'knowledge') ";
            $taxonomies = str_replace($taxonomy, '', $taxonomies);
        }
        $sql = 'SELECT SUM(points)
                FROM mdl_local_booste_list_tags lblt 
                LEFT JOIN mdl_local_booste_list_fields lblf  ON lblt.field = lblf.id
                LEFT JOIN mdl_local_booste_tags lbt  ON lbt.tag = lblt.id
                WHERE
                lbt.booste = (?)
                AND lblf.name NOT IN ("discipline", "course_time")
                AND lblt.ignore_suggestions = 0';

        $points = $DB->get_field_sql($sql, array($boosteid, $boosteid)) + 10;

        return $points;
    }

    /**
     * Create a module in course.
     *
     * @param object $stepmodule
     * @param object $oldcm
     * @param object $course
     * @param int $section
     * @return object
     */
    static function create_module($stepmodule, $oldcm, $course, $section) {
        global $CFG;
        $moduledata = json_decode(htmlspecialchars_decode($stepmodule->data));

        foreach ($moduledata as $key => $value) {
            if (is_object($value)) {
                $moduledata->$key = (array) $moduledata->$key;
            }
            if (is_array($value) && count($value) > 0) {
                foreach ($value as $key2 => $value2) {
                    if (is_object($value2)) {
                        $value[$key2] = (array) $value2;
                    }
                }
                $moduledata->$key = $value;
            }
        }

        list($module, $context, $cw, $cm, $data) = prepare_new_moduleinfo_data($course, $oldcm->name, $moduledata->section);
        if ($data->modulename == "game") {
            $_POST['type'] = $moduledata->type;
        }
        $modmoodleform = "$CFG->dirroot/mod/$module->name/mod_form.php";
        if (file_exists($modmoodleform)) {
            require_once($modmoodleform);
        } else {
            print_error('noformdesc');
        }
        $mformclassname = 'mod_' . $module->name . '_mod_form';
        $mform = new $mformclassname($data, $cw->section, $cm, $course);

        $moduledata->section = $section;
        $data->section = $section;

        $mform->set_data($data);

        return add_moduleinfo($moduledata, $course, $mform);
    }
}
