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
 * Class file for external function definition for simpleportfolio block.
 *
 * @package    block_simpleportfolio
 * @category   external
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_simpleportfolio\external;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . "/externallib.php");
require_once($CFG->dirroot . "/user/lib.php");

use external_api;
use external_description;
use external_function_parameters;
use external_multiple_structure;
use external_single_structure;
use external_value;
use external_warnings;

/**
 * External function class for webservices.
 *
 * @package    block_simpleportfolio
 * @copyright  David OC <davidherzlos@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class userclass extends external_api {
    /**
     * Returns a description of method parameters.
     *
     * @return external_description
     */
    public static function get_users_info_parameters(): external_description {
        return new external_function_parameters(
            array('emails' => new external_multiple_structure(
                new external_value(PARAM_TEXT, 'User email'), 'Array of emails', VALUE_REQUIRED
            ))
        );
    }

    /**
     * The external function to get basic user info.
     *
     * @param array $emails An array of emails
     * @return array An array with user information
     */
    public static function get_users_info(array $emails): array {
        global $DB;

        // Do the validations
        // Do the capability/context checks
        // Do any additional security/restriction check
        // Call any core API or internal APIS to do the job
        // Return a consistent data structure adding missing information
        $users = [];
        $warnings = [];
        foreach ($emails as $email) {
            $user = $DB->get_record('user', ['email' => $email]);

            if (!$user || !can_view_user_details_cap($user)) {
                $warnings[] = array(
                    'item' => $email,
                    'warningcode' => 'invalidemail',
                    'message' => 'Email was not found or you are not allowed to view details for the related profile.',
                );
                continue;
            }

            $users[] = array(
                'id' => $user->id,
                'email' => $user->email,
            );
        }

        return array(
            'users' => $users,
            'warnings' => $warnings
        );
    }

    /**
     * Returns a description of method result value.
     *
     * @param array $emails An array of emails
     * @return external_description
     */
    public function get_users_info_returns(): external_description {
        return new external_single_structure(
            array('users' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'id' => new external_value(PARAM_INT, 'User ID'),
                            'email' => new external_value(PARAM_TEXT, 'User email')
                        )
                    )
                ),
                'warnings' => new external_warnings()
            )
        );
    }
}
