<?php

namespace local_booste\form;

use context;
use moodle_url;
use local_booste\helper;

defined('MOODLE_INTERNAL') || die();

class challenge_form extends \core_form\dynamic_form {

    /**
     * Définition du formulaire
     */
   public function definition() {
    global $DB;
    $mform = $this->_form;

    // Récupération sécurisée
    $boosteId = $this->_ajaxformdata['booste'] ?? $this->_ajaxformdata['id'] ?? 0;
    $challengeData = $this->_ajaxformdata['challengedata'] ?? '';

    // Utilisez des champs cachés standards
    $mform->addElement('hidden', 'booste', $boosteId);
    $mform->setType('booste', PARAM_INT);

    $mform->addElement('hidden', 'challengedata', $challengeData);
    $mform->setType('challengedata', PARAM_RAW);

    $mform->addElement('static', 'description', '', 
        "<i class='icon fa fa-warning'></i> " . get_string('add_challenge_warning', 'local_booste'));

    $mform->addElement('text', 'name', get_string('name', 'local_booste'));
    $mform->setType('name', PARAM_TEXT);
    $mform->addRule('name', get_string('error', 'local_booste'), 'required');
}
    /**
     * Contexte pour la soumission dynamique
     */
    protected function get_context_for_dynamic_submission(): context {
        return \context_system::instance();
    }

    /**
     * Vérification des droits d’accès pour la soumission dynamique
     */
    protected function check_access_for_dynamic_submission(): void {
        $boosteId = isset($this->_ajaxformdata['id']) ? (int)$this->_ajaxformdata['id'] : 0;
        if (!helper::can_edit_form($boosteId)) {
            throw new \moodle_exception('nopermission', 'local_booste');
        }
    }

    /**
     * Traitement de la soumission
     */
    public function process_dynamic_submission() {
        global $DB;

        $data = $this->_ajaxformdata;
        $boosteId = isset($data['booste']) ? (int)$data['booste'] : 0;
        $fields = ['challenge', 'learning_mode'];

        $challengedata = !empty($data['challengedata']) ? json_decode($data['challengedata'], true) : null;

        if (!$challengedata) {
            throw new \moodle_exception(get_string('error', 'local_booste'));
        }

        // Supprimer et recréer les tags
        helper::delete_booste_tags($boosteId, $fields);
        helper::create_booste_tags($boosteId, $challengedata, $fields);

        // Ajouter le tag challenge personnalisé
        $fieldId = $DB->get_field('local_booste_list_fields', 'id', ['name' => 'challenge'], MUST_EXIST);
        $tagId = $DB->insert_record('local_booste_list_tags', [
            'field' => $fieldId,
            'name' => $data['name'],
            'custom' => 1
        ]);

        // Lier le tag au booste
        $DB->insert_record('local_booste_tags', [
            'booste' => $boosteId,
            'tag' => $tagId
        ]);

        return [];
    }

    /**
     * Définir les valeurs par défaut si nécessaire
     */
    public function set_data_for_dynamic_submission(): void {
        // Pour l'instant, aucune valeur par défaut spécifique
    }

    /**
     * URL de redirection après soumission dynamique
     */
    protected function get_page_url_for_dynamic_submission(): moodle_url {
        return new moodle_url('/');
    }
}
