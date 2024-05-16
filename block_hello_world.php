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
 * Block hello_world is defined here.
 *
 * @package     block_hello_world
 * @copyright   2024 Is Faid Aznam <isfaid.aznam@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_hello_world extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_hello_world');
    }

    public function get_content() {
        global $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        $message = $DB->get_field('block_hello_world', 'message', array('id' => 0));

        $this->content = new stdClass();
        if ($message) {
            $this->content->text = html_writer::tag('p', 'Content obtain from block_hello_world DB: ' . $message);
        } else {
            $this->content->text = html_writer::tag('p', 'Error obtaining message from block_hello_world DB');
        }

        return $this->content;
    }
}