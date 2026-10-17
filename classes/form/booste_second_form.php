<?php

namespace local_booste\form;

use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class booste_second_form extends \core\form\persistent {

    /** @var string Persistent class name. */
    protected static $persistentclass = \local_booste\booste::class;

    protected static $fieldstoremove = array(
        'create_challenge',
        'mform_isexpanded_id_header_challenges',
        'mform_isexpanded_id_header_evaluations',
        'mform_isexpanded_id_header_learning_activities',
        'mform_isexpanded_id_header_objectives'
    );

    protected static $foreignfields = array(
        'course', 'evaluation', 'objective', 'place', 'theme', 'method',
        'booste', 'challenge', 'eval_type', 'learning_mode',
        'redirect', 'submitbutton', 'submitnext', 'submitbefore'
    );

    /**
     * Define the form.
     */
    public function definition() {

        global $DB, $PAGE, $CFG;

        $mform = $this->_form;
        $booste = $this->get_persistent();

        // Sécurité : Si le persistent n'est pas chargé, on ne peut pas continuer proprement.
        if (!$booste || $booste->get('id') <= 0) {
            throw new \moodle_exception('error_booste_not_found', 'local_booste');
        }

        $mform->addElement('hidden', 'course');
        $mform->setConstant('course', $booste->get('course'));

        $mform->addElement('hidden', 'created_by');
        $mform->setConstant('created_by', $booste->get('created_by'));

        // --- SECTION CHALLENGES ---
        $mform->addElement('header', 'header_challenges', get_string('challenge', 'local_booste'));

        $challenges = helper::get_records_from_field("challenge");

        // Moodle donne l'ID "id_challenge" à l'autocomplete par défaut.
        // Pour éviter la collision d'ID entre le champ autocomplete et le bouton, on
        // change l'ID de l'autocomplete et on remet l'ID du bouton sur "id_challenge"
        // (que le JS popup_form attend).
        $select_challenge = $mform->addElement(
            'autocomplete',
            'challenge',
            "<b>" . get_string('challenge', 'local_booste') . "</b>",
            $challenges,
            array('multiple' => true, 'id' => 'challenge_autocomplete')
        );

        if (helper::can_edit_form($booste->get('id'))) {
            $mform->addElement('static', 'add_challenge_help', '',
                '<i>' . get_string('add_challenge_help', 'local_booste') . '</i>');

            // Réattribuer l'ID attendu par le JS popup_form : "id_challenge"
            $mform->addElement('button', 'add_challenge', get_string('add_challenge', 'local_booste'), array(
                'id' => 'id_challenge',
                "data-action" => "newboostepopup",
                'data-formname' => 'challenge',
                'data-id' => $booste->get('id'),
                'data-editid' => 0
            ));
        }

        // --- SECTION OBJECTIVES ---
        $mform->addElement(
            'header',
            'header_objectives',
            get_string('header_objectives', 'local_booste') .
            '&nbsp;<i class="icon fa fa-exclamation-circle text-danger fa-fw" title="' . get_string('required') . '"></i>'
        );

        $mform->addElement('html', '<div id="objective_list"></div>');

        if (helper::can_edit_form($booste->get('id'))) {
            $mform->addElement('button', 'objective', get_string('add_objective', 'local_booste'), array(
                'id' => 'id_objective',
                "data-action" => "newboostepopup",
                'data-formname' => 'objective',
                'data-id' => $booste->get('id'),
                'data-editid' => 0
            ));
        }

        // --- SECTION EVALUATIONS ---
        $mform->addElement('header', 'header_evaluations', get_string('header_evaluations', 'local_booste'));
        $mform->addElement('html', '<div id="evaluation_list"></div>');

        if (helper::can_edit_form($booste->get('id'))) {
            $mform->addElement('button', 'evaluation', get_string('add_evaluation', 'local_booste'), array(
                'id' => 'id_evaluation',
                "data-action" => "newboostepopup",
                'data-formname' => 'evaluation',
                'data-id' => $booste->get('id'),
                'data-editid' => 0
            ));
        }

        // --- SECTION LEARNING ACTIVITIES ---
        $mform->addElement('header', 'header_learning_activities', get_string('header_learning_activities', 'local_booste'));

        $learning_modes = $DB->get_records_sql_menu(
            'SELECT id, name FROM {local_booste_list_tags}
             WHERE field = (SELECT id FROM {local_booste_list_fields} WHERE name = (?))',
            array("learning_mode")
        );

        $learning_mode_group = array();
        if ($learning_modes) {
            foreach ($learning_modes as $key => $value) {
                $label = get_string($value, 'local_booste');
                $label = str_replace(array('[', ']'), '', $label);

                // Classe ajoutée pour contrôler finement l'espacement image/légende.
                $html = "<div class='learning-mode'>
                            <img width='90' src='" . $CFG->wwwroot . "/local/booste/pix/" . $value . ".png' alt='" . s($label) . "' />
                            <span class='learning-mode-label'>" . $label . "</span>
                         </div>";

                $learning_mode_group[] = $mform->createElement(
                    'advcheckbox',
                    'learning_mode' . $key,
                    '',
                    $html,
                    array('group' => 1),
                    array(0, $key)
                );
            }
        }

        $mform->addElement('static', 'learning-mode_usage', '', get_string('learning_mode_usage', 'local_booste'));
        $mform->addGroup(
            $learning_mode_group,
            'learning_mode_ar',
            "<b>" . get_string('learning_mode_ar', 'local_booste') . "</b>",
            array(' '),
            false
        );
        $mform->addHelpButton('learning_mode_ar', 'learning_mode', 'local_booste');

        // CSS inline : réduit l'espacement entre les 5 images et leurs légendes.
        $mform->addElement('html', '
            <style>
                #fgroup_id_learning_mode_ar .felement {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: flex-start;
                    justify-content: center;
                    gap: 10px 14px;
                }

                #fgroup_id_learning_mode_ar .fcheckbox {
                    margin: 0;
                    padding: 0 2px;
                }

                #fgroup_id_learning_mode_ar .fcheckbox label {
                    margin: 0 !important;
                    line-height: 1.2;
                }

                #fgroup_id_learning_mode_ar .learning-mode {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    margin: 0;
                    padding: 0;
                }

                #fgroup_id_learning_mode_ar .learning-mode img {
                    display: block;
                    margin: 0 auto 4px auto !important; /* espace image -> légende réduit */
                }

                #fgroup_id_learning_mode_ar .learning-mode .learning-mode-label {
                    display: block;
                    margin-top: 0 !important;
                    line-height: 1.15;
                }
            </style>
        ');

        // --- HIDDEN & SETTINGS ---
        $mform->addElement('hidden', 'timestamp');
        $mform->setType('timestamp', PARAM_INT);
        $mform->setConstant('timestamp', $this->_customdata['timestamp'] ?? time());

        // Refresh des listes via AJAX
        $PAGE->requires->js_call_amd('local_booste/refresh_data', 'refreshBoosteDatas', [$booste->get('id'), "objective"]);
        $PAGE->requires->js_call_amd('local_booste/refresh_data', 'refreshBoosteDatas', [$booste->get('id'), "evaluation"]);

        // Note : Les appels popup_form init sont maintenant gérés dans le fichier de page PHP pour plus de stabilité.

        $mform->setExpanded('header_challenges');
        $mform->setExpanded('header_evaluations');
        $mform->setExpanded('header_learning_activities');
        $mform->setExpanded('header_objectives');

        // --- BUTTONS ---
        $buttonarray = array();
        $buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('save'));

        if (helper::can_edit_form($booste->get('id'))) {
            $buttonarray[] = $mform->createElement('submit', 'submitbefore', get_string('booste_before', 'local_booste'));
            $buttonarray[] = $mform->createElement('submit', 'submitnext', get_string('booste_next', 'local_booste'));
        } else {
            $courseurl = $this->_customdata['course'];
            $buttonarray[] = $mform->createElement(
                'button',
                'button_before',
                get_string('booste_before', 'local_booste'),
                array("onclick" => "window.location.href = '" . $CFG->wwwroot . "/local/booste/forms/booste_first_form.php?course=" . $courseurl . "&booste=" . $booste->get('id') . "';")
            );
            $buttonarray[] = $mform->createElement(
                'button',
                'button_next',
                get_string('booste_next', 'local_booste'),
                array("onclick" => "window.location.href = '" . $CFG->wwwroot . "/local/booste/forms/booste_third_form.php?course=" . $courseurl . "&booste=" . $booste->get('id') . "';")
            );
        }

        $buttonarray[] = $mform->createElement(
            'button',
            'return_index',
            get_string('return_index', 'local_booste'),
            array("onclick" => "window.location.href = '" . $CFG->wwwroot . "/local/booste/index.php?course=" . $this->_customdata['course'] . "';")
        );

        $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);

        // --- DEFAULTS ---
        if ($booste) {
            $booste_challenges = helper::get_records_for_edit($booste->get('id'), "challenge");
            $booste_learning_modes = helper::get_records_for_edit($booste->get('id'), "learning_mode");

            foreach ($booste_learning_modes as $lm_id) {
                $mform->setDefault('learning_mode' . $lm_id, $lm_id);
            }

            $select_challenge->setValue($booste_challenges);
        }
    }
}
