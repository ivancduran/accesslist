<?php

// Allow List
$allowList =  array(
    // Role
    'Users' => array(
        // Controller
        'admin' => array(
            // Actions
            'list','config','upload'
        ),
        // Controller
        'api' => array(
            // Actions
            'getlist'
        ),
        // Controller
        'acl' => array(
            // Actions
            '*'
        ),
        // Controller
        'test' => array(
            // Actions
            '*'
        )
    ),
    // Role
    'Guest' => array(
        // Controller
        'video' => array(
            // Actions
            'list','config','upload'
        )
    ),
    'Admin' => array(
        // Controller
        'video' => array(
            // Actions
            '*'
        )
    ),
);