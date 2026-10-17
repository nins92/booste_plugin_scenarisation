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

namespace local_booste\form;

use context;
use moodle_url;

defined('MOODLE_INTERNAL') || die();

class objective_form extends \core_form\dynamic_form {


    protected static $foreignfields = array('verb', 'taxonomy_name');
    protected static $fieldstoremove = array('taxonomy_name');

    public function definition() {

        global $DB;

        $mform = $this->_form;
        

        //$taxonomies = $DB->get_records_menu('local_booste_list_taxonomy');
        $taxonomies = \local_booste\helper::get_records_from_field("taxonomy");
        // $manual = array("0" => get_string('taxonomy_manual', 'local_booste'));
        // $taxonomies = $manual + $taxonomies;

        $mform->addElement('hidden', 'booste');
        $mform->setConstant('booste',  $this->_ajaxformdata['id']);
        $mform->setType('booste', PARAM_INT);

        //$mform->addElement('static', 'objective_example', get_string('objective_example', 'local_booste'));
        //$mform->addHelpButton('objective_example', 'objective_example_help', 'local_booste');

        $mform->addElement('html', '<div>
                                        <label>'.get_string('objective_example', 'local_booste').'</label> 
                                        </br>
                                        <label>'.get_string('canva', 'local_booste').' 1 :</label>
                                        <ul id="objective_example_1">
                                            <li>'.get_string('objective_example_1', 'local_booste').'</li>
                                        </ul>
                                        <label class="d-inline word-break">'.get_string('canva', 'local_booste').' 2 :</label>
                                        <ul id="objective_example_2">
                                            <li>'.get_string('objective_example_2', 'local_booste').'</li>
                                        </ul>
                                    </div></br>');


        $mform->addElement('select', 'taxonomy', get_string('taxonomy', 'local_booste'), $taxonomies);
        $mform->addHelpButton('taxonomy', 'taxonomy', 'local_booste');

        $mform->addElement('html',
         '
          <div class="form-group row  fitem" id="verbs">
            <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
            <label class="d-inline word-break">'.get_string('verbs_example', 'local_booste').'</label>
            </div>
            <div id="verbs_list" class="col-md-9 form-inline align-items-start felement">
            </div>
            <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
            <label class="d-inline word-break"><a href="'.get_string("taxonomy_verbs_link", "local_booste").'" target="_blank">'.get_string('complete_list_verbs', 'local_booste').'</a></label>
            </div>
          </div>');

        $mform->addElement('static', 'objective_placeholder', null, get_string('objective_placeholder', 'local_booste'));
        $mform->addElement('textarea', 'objective_sentence', get_string('objective_sentence', 'local_booste'), 'wrap="virtual" rows="8" cols="45"');
        //$mform->addHelpButton('objective_sentence', 'objective_sentence', 'local_booste');
        $mform->setType('booste', PARAM_NOTAGS);
        $mform->addRule('objective_sentence', get_string('error'), 'required');


        if($this->_ajaxformdata['editid'] > 0) {
            $objective = $DB->get_record('local_booste_objective', array("id" => $this->_ajaxformdata['editid']));
            $mform->addElement('hidden', 'id');
            $this->set_data($objective);
        }

    }
    /**
     * Renders the html form (same as display, but returns the result).
     *
     * Note that you can only output this rendered result once per page, as
     * it contains IDs which must be unique.
     *
     * @return string HTML code for the form
     */
    public function render() {
        global $DB;
        global $PAGE;
        $data = $this->_ajaxformdata;
        $objective = \local_booste\objective::get_record(['id' => $data['editid']]);
        $taxonomy = $objective ? $objective->get('taxonomy') : $DB->get_field('local_booste_list_tags', 'id', array('name' => 'knowledge'));
        $PAGE->requires->js_call_amd('local_booste/helper', 'getVerbs', array('taxonomyid' => $taxonomy));
        return parent::render();
    }
    protected function get_context_for_dynamic_submission(): context {
        return \context_system::instance();
    }

    protected function check_access_for_dynamic_submission(): void {
        // TODO: Implement check_access_for_dynamic_submission() method.
    }

    public function process_dynamic_submission() {
        global $DB;
        $data = $this->_ajaxformdata;

        if(isset($data['id'] ) && $data['id'] > 0) {

            $objective = \local_booste\objective::get_record(['id' => $data['id']]);
            $objective->set('taxonomy', $data['taxonomy']);
            $objective->set('objective_sentence', $data['objective_sentence']);

            $objective->update();

            $DB->delete_records("local_booste_tags", array("booste" => $data["booste"], "is_taxonomy" => 1));
            $objectives = $DB->get_fieldset_sql("SELECT taxonomy FROM {local_booste_objective} WHERE booste = (?)", array($data["booste"]));
            foreach($objectives as $objective) {
                $DB->insert_record("local_booste_tags", array("booste" => $data["booste"], "tag" => $objective, "is_taxonomy" => 1));
            }
        }
        else {
            $objective = new \local_booste\objective(0, (object)[
                    'booste' => $data['booste'],
                    'taxonomy' => $data['taxonomy'],
                    'objective_sentence' => $data['objective_sentence'],
            ]);
            $objective->create();
            $objective->save();

            $DB->insert_record("local_booste_tags", array("booste" => $data["booste"], "tag" => $data["taxonomy"], "is_taxonomy" => 1));
        }
    }

    public function set_data_for_dynamic_submission(): void {
    }

    protected function get_page_url_for_dynamic_submission(): moodle_url {
                return new moodle_url('/');
    }
}