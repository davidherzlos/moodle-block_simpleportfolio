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
 * Edit form for the simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Edit form class for the simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_simpleportfolio_edit_form extends block_edit_form {

    /**
     * Returns the specific form definition
     *
     * @param  MoodleQuickForm $mform
     * @return void
     */
    protected function specific_definition($mform): void {
        $mform->addElement('header', 'config_header', get_string('header', 'block_simpleportfolio'));
        $mform->addElement('text', 'config_sometext', get_string('sometext', 'block_simpleportfolio'));
        $mform->setType('config_sometext', PARAM_TEXT);
    }
}
