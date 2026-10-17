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

/**
 * element Main class
 *
 * @package    local_booste
 * @copyright  XXX
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class element extends \core\persistent {

    /** Table name for the persistent. */
    const TABLE = 'local_booste_step_element';

    /**
     * Return the definition of the properties of this model.
     *
     * @return array
     */
    protected static function define_properties() {
        return array(
                'id' => array(
                    'type' => PARAM_INT,
                ),
                'booste_step' => array(
                    'type' => PARAM_INT,
                ),
                'module' => array(
                    'type' => PARAM_INT,
                    'null' => NULL_ALLOWED,
                    'default' => null
                ),
                'step_resource' => array(
                    'type' => PARAM_INT,
                    'null' => NULL_ALLOWED,
                    'default' => null
                ),
                'element_type' => array(
                    'type' => PARAM_NOTAGS,
                ),
                'name' => array(
                    'type' => PARAM_NOTAGS,
                ),
                'idx' => array(
                    'type' => PARAM_INT,
                    'null' => NULL_ALLOWED,
                    'default' => null
                ),
                'data' => array(
                    'type' => PARAM_NOTAGS,
                ),
                'archetype' => array(
                    'type' => PARAM_INT,
                    'default' => '0'
                ),
        );
    }
}