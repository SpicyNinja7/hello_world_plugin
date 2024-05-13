<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_block_hello_world_upgrade($oldversion) {
    global $DB;

    if ($oldversion < 2024051100) {
        // Insert "Hello World!" message into the database.
        $DB->insert_record('block_hello_world', (object) [
            'message' => 'Hello World!',
        ]);
    }

    return true;
}