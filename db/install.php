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
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     block_helloworld
 * @category    upgrade
 * @copyright   2024 Is Faid Aznam <isfaid.aznam@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Custom code to be run on installing the plugin.
 */

defined('MOODLE_INTERNAL') || die();

function xmldb_block_helloworld_install() {
    global $DB;

    // Create the table
    $table = new xmldb_table('hello_world');
    $table->addFieldInfo('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE);
    $table->addFieldInfo('message', XMLDB_TYPE_TEXT, null, null, null, null);

    if (!$DB->get_manager()->table_exists($table)) {
        $DB->get_manager()->create_table($table);
    }

    // Insert the record
    $record = new stdClass();
    $record->message = 'Hello World!';
    $DB->insert_record('hello_world', $record);

    // print out record
    $record = $DB->get_record('hello_world', array());
    print $record;
}
return true;
