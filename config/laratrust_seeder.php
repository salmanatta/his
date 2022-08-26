<?php
return [
    'roles_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'purchase' => 'c,r,u,d',
            'sale' => 'c,r,u,d',
            'transfer' => 'c,r,u,d',
            'configuration' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'purchase' => 'c,r,u,d',
            'sale' => 'c,r,u,d',
            'transfer' => 'c,r,u,d',
            'configuration' => 'c,r,u,d',
        ],
        'purchase' => [
            'purchase' => 'c,r,u,d',
        ],
        'sale' => [
            'sale' => 'c,r,u,d',
        ],
        'transfer' => [
            'transfer' => 'c,r,u,d',
        ],
    ],    
    'permissions_map' =>[
        'c' =>'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
        ]
];
