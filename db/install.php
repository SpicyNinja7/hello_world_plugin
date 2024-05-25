<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Installation script for the hello_world block.
 *
 * @package     block_hello_world
 * @copyright   2024 Is Faid Aznam <isfaid.aznam@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_block_hello_world_install() {
    global $DB;

    // Disable hello_world on new installs by default.
    $DB->set_field('block', 'visible', 0, ['name' => 'hello_world']);

    // Check if the database record exists.
    $record = $DB->get_record('hello_world', array());

    if (!$record) {
        // Create a new database record.
        $record = new stdClass();
        $record->message = 'Hello World!';
        $DB->insert_record('hello_world', $record);
    }
}