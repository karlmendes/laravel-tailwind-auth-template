<?php

return [
    [
        'title' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'home',
        'can' => 'dashboard.access',
    ],

    [
        'title' => 'Gerenciar',
        'icon' => 'folder',
        'can' => 'manage.access',
        'children' => [
            [
                'title' => 'Usuários',
                'route' => 'admin.users.index',
                'icon' => 'users',
                'can' => 'users.access',
            ],
            [
                'title' => 'Grupos',
                'route' => 'admin.roles.index',
                'icon' => 'shield',
                'can' => 'roles.access',
            ],
            [
                'title' => 'Permissões',
                'route' => 'admin.permissions.index',
                'icon' => 'key',
                'can' => 'permissions.access',
            ],
        ],
    ],
];