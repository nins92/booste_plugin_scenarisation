<?php
namespace local_booste\external;

use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use local_booste\booste;

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/externallib.php');

class can_edit_booste extends external_api {

    /**
     * Description des paramètres
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'id' => new external_value(PARAM_INT, 'ID du booste'),
        ]);
    }

    /**
     * Exécution de la fonction
     */
    public static function execute($id): array {
        // Validation des paramètres Moodle
        $params = external_api::validate_parameters(self::execute_parameters(), ['id' => $id]);
        $id = $params['id'];

        // Vérifier que l’ID est valide
        if (empty($id)) {
            return ['canedit' => false];
        }

        // Récupération du booste
        $booste = booste::get_record(['id' => $id]);
        if (!$booste) {
            // Au lieu de lancer une exception, on renvoie false
            return ['canedit' => false];
        }

        // Vérification des droits
        $canedit = \local_booste\helper::can_edit_form($booste->get('id'));

        return ['canedit' => $canedit];
    }

    /**
     * Description du retour
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'canedit' => new external_value(PARAM_BOOL, 'Indique si l’utilisateur peut éditer le booste')
        ]);
    }
}
