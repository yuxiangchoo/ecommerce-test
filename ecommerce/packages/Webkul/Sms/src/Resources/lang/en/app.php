<?php

return [
    'menu' => [
        'title'    => 'SMS Settings',
        'info'     => 'Configure default driver and provider credentials.',
        'settings' => 'General Settings',
    ],
    'fields' => [
        'driver' => 'Default Driver',
        'from'   => 'Default Sender ID',
    ],
    'anchor' => [
        'title'       => 'Anchor SMS',
        'mode'        => 'Auth Mode',
        'base'        => 'Base URL',
        'from'        => 'Sender ID (optional)',
        'dataCoding'  => 'Data Coding',
        'user'        => 'User (No-Token)',
        'pass'        => 'Password (No-Token)',
        'username'    => 'Username (Token)',
        'password'    => 'Password (Token)',
        'token_path'  => 'Token Path',
        'mt_path'     => 'MT Path (Token)',
        'mt_no_token' => 'MT Path (No-Token)',
    ],
];
