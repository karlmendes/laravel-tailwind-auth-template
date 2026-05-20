<?php

return [
    [
        'title' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'home',
        'can' => null,
    ],

    [
        'title' => 'Gerenciar',
        'icon' => 'folder',
        'can' => null,
        'children' => [
            [
                'title' => 'Usuários',
                'route' => 'admin.users.index',
                'icon' => 'users',
                'can' => null,
            ],
            [
                'title' => 'Grupos',
                'route' => 'admin.roles.index',
                'icon' => 'shield',
                'can' => null,
            ],
            [
                'title' => 'Permissões',
                'route' => 'admin.permissions.index',
                'icon' => 'key',
                'can' => null,
            ],
        ],
    ],
];