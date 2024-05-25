<?php
defined('MOODLE_INTERNAL') || die();

$functions = array(
    'block_hello_world_install' => array(
        'classname' => 'block_hello_world_install',
        'methodname' => 'install',
        'classpath' => 'block/hello_world/classes/install.php',
        'description' => 'Install the hello_world block database table',
        'type' => 'write',
        'capabilities' => 'moodle/site:config',
    ),
);