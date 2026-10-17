<?php
/**
 * @package    local_booste
 * @copyright  XXX
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_booste;

defined('MOODLE_INTERNAL') || die();

class booste extends \core\persistent {

    /** Table name for the persistent. */
    const TABLE = 'local_booste';

    /**
     * Helper pour récupérer un enregistrement par ses filtres.
     * Signature compatible avec core\persistent::get_record().
     *
     * @param array $filters
     * @param int $strictness
     * @return booste|false
     */
    public static function get_record(array $filters = [], int $strictness = IGNORE_MISSING) {
        global $DB;

        $record = $DB->get_record(self::TABLE, $filters, '*', $strictness);
        if ($record) {
            return new static($record->id, $record);
        }
        return false;
    }

    /**
     * Return the definition of the properties of this model.
     *
     * @return array
     */
    protected static function define_properties() {
        return array(
            'name' => array(
                'type' => PARAM_NOTAGS,
                'null' => NULL_ALLOWED,
                'default' => null
            ),
            'timestamp' => array(
                'type' => PARAM_INT,
            ),
            'privacy' => array(
                'type' => PARAM_INT,
            ),
            'course' => array(
                'type' => PARAM_INT,
            ),
            'group_size' => array(
                'type' => PARAM_INT,
                'null' => NULL_ALLOWED,
                'default' => null
            ),
            'created_by' => array(
                'type' => PARAM_INT,
            ),
            'description' => array(
                'type' => PARAM_NOTAGS,
                'null' => NULL_ALLOWED,
                'default' => null
            ),
            'is_deployed' => array(
                'type' => PARAM_INT,
                'default' => 0
            ),
            'is_complete' => array(
                'type' => PARAM_INT,
                'default' => 0
            ),
        );
    }
}
