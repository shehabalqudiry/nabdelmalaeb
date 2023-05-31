<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'banners' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'leagues' => 'c,r,u,d',
            'articles' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'matches' => 'c,r,u,d',
            'videos' => 'c,r,u,d',
        ],
        'admin' => [],
        'editor' => [],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
