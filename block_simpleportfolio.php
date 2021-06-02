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
 * File description for the simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use \block_simpleportfolio\output\main_widget;

/**
 * A block class
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_simpleportfolio extends block_base {

    /**
     * Init.
     */
    public function init(): void {
        $this->title = get_string('pluginname', 'block_simpleportfolio');
    }

    /**
     * Returns the contents.
     *
     * @return stdClass contents of block
     */
    public function get_content(): stdClass {

        if (isset($this->content)) {
            return $this->content;
        }

        $this->content = new stdClass();

        if (!empty($this->config->sometext)) {
            $renderable = new main_widget($this->config->sometext);
            $renderer = $this->page->get_renderer('block_simpleportfolio');
            $this->content->text = $renderer->render($renderable);
        }

        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Returns true if the block WILL USE per-instance configuration
     * @return boolean
     */
    public function instance_allow_multiple(): bool {
        return true;
    }
}
