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
 * Library functions and component callbacks for simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Callback to insert a link on the front page navigation menu located at index.php.
 *
 * @param navigation_node $frontpage Front page node in the navigation tree.
 */
function block_simpleportfolio_extend_navigation_frontpage(navigation_node $frontpage): void {
    $frontpage->add(
        get_string('blocksadminpage', 'block_simpleportfolio'),
        new moodle_url('/admin/blocks.php')
    );
}
