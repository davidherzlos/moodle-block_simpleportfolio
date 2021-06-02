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
 * External functions and services definitions for block simpleportfolio
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// External functions
$functions = array(
    'block_simpleportfolio_get_users_info' => array(
        'classname' => 'block_simpleportfolio\external\userclass',
        'methodname' => 'get_users_info',
        'description' => 'Returns the basic info for the specified users',
        'type' => 'read',
        'ajax' => true,
        'capabilities' => 'moodle/user:viewdetails',
        'services' => array(
            MOODLE_OFFICIAL_MOBILE_SERVICE,
            'block_simple_portfolio_service'
        ),
    )
);

// Pre-build services
$services = array(
    'Block Simple Portfolio service' => array(
        'shortname' => 'simpleportfolio',
        'restrictedusers' => 1,
        'enabled' => 1,
        'functions' => array(
            'block_simpleportfolio_get_users_info'
        )
    )
);
