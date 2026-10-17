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

/**
 * A collection of tests for accesslib::has_capability().
 *
 * @package    core
 * @copyright
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_booste\external\get_verbs;

/**
 * Unit tests tests for has_capability.
 *
 * @package    core
 * @copyright
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @coversDefaultClass \local_booste\external\get_verbs
 */
class get_verbs_test extends \advanced_testcase {
    /**
     * Helper
     *
     * @param ... $params
     * @return mixed
     */
    protected function get_verbs(...$params) {
        $canjoin = get_verbs::execute(...$params);

        return external_api::clean_returnvalue(get_verbs::execute_returns(), $canjoin);
    }


    /**
     * Test execute API CALL with no instance
     */
    public function test_execute_with_instance() {
        global $DB;
        $this->resetAfterTest();
        // Créer les entités ...
        $lvid = $DB->insert_record('local_booste_list_verb',  (object)[
                'name' => 'LV 1'
        ]);

        $DB->insert_record('local_booste_list_tax_verb', (object)[
                'verb' => $lvid,
                'taxonomy' => 1234
        ]);
        $verbs = $this->get_verbs(1234);
        $this->assertNotEmpty($verbs);
    }
}