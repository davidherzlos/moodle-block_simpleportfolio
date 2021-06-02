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

namespace block_simpleportfolio\output;

use renderable;
use renderer_base;
use templatable;

require_once($CFG->dirroot . '/blocks/simpleportfolio/lib.php');

/**
 * Class containing data for simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class main_widget implements renderable, templatable {

    /**
     * main constructor. Initialize the block
     *
     * @throws \dml_exception
     */
    public function __construct(string $data) {
        $this->data = $data;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param  renderer_base $output
     * @return array Context variables for the template
     * @throws \coding_exception
     *
     */
    public function export_for_template(renderer_base $output): array {
        return ['sometext' => $this->data];
    }
}
