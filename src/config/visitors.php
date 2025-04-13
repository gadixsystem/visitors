<?php

/**
 * Config file of GadixSystem Visitors Package
 */

return [
    /**
     * Visual interface of visitors
     */
    'dashboard' => true,
    /**
     * Prefix for visitors route
     * Navigate to your app /visitors (or your new path to view interface)
     */
    'prefix' => 'visitors',
    /**
     * Create a new entry in the visitors table on every request
     */
    'logActions' => false,
    /**
     * Middleware
     * Here you can put your prefers middleware to visitors dashboard
     */
    'middleware' => [
        'web',
        //'auth',
        'visitors'
        // ...
    ]
];
