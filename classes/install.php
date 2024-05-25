<?php

defined('MOODLE_INTERNAL') || die();

class block_hello_world_install {

    public static function install() {
        global $DB;

        // Define the database table.
        $table = new xmldb_table('block_hello_world');

        // Add the table columns.
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('text', XMLDB_TYPE_CHAR, 255, null, XMLDB_NOTNULL, null, null);

        // Add the table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $DB->create_table($table);

        // Insert data into the table.
        $record = new stdClass();
        $record->text = 'Hello, World!';
        $DB->insert_record('block_hello_world', $record);
    }

}