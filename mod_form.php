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
 * The main isselfeval configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Module instance settings form
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_isselfeval_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG;

        $mform = $this->_form;

        // Adding the "general" fieldset, where all the common settings are showed.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field.
        $mform->addElement('text', 'name', get_string('isselfevalname', 'isselfeval'), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'isselfevalname', 'isselfeval');

        // Adding the standard "intro" and "introformat" fields.
        if ($CFG->branch >= 29) {
            $this->standard_intro_elements();
        } else {
            $this->add_intro_editor();
        }

        // Adding the rest of isselfeval settings, spreading all them into this fieldset
        // ... or adding more fieldsets ('header' elements) if needed for better logic.
        $this->metadata_elements();

        // Add standard grading elements.
        $this->standard_grading_coursemodule_elements();

        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }
    
    function metadata_elements() {
        $mform = $this->_form;

        $mform->addElement('header', 'metadata', 'Meta data');

        $mform->addElement('text', 'year', '年度', array('maxlength' => 4, 'minlength' => 4));
        $mform->setType('year', PARAM_INT);
        $mform->setDefault('year', (int)date('Y'));
        $mform->addRule('year', null, 'required', null, 'client');

        $mform->addElement('select', 'subject', '科目', array('A' => '情報基礎数学A', 'B' => '情報基礎数学B', 'C' => '情報基礎数学C'));
        $mform->addRule('subject', null, 'required', null, 'client');

        $mform->addElement('text', 'times', '回', array('maxlength' => 2, 'minlength' => 1));
        $mform->setType('times', PARAM_INT);
        $mform->setDefault('times', 1);
        $mform->addRule('times', null, 'required', null, 'client');

        $mform->addElement('textarea', 'target', '演習目標', array(
            'cols' => 70,
            'rows' => 5,
            'placeholder' => "演習の分野や目標とする正答率を記入してください。"
        ));
        $mform->setType('target', PARAM_TEXT);
        $mform->addRule('target', null, 'required', null, 'client');
    }
}