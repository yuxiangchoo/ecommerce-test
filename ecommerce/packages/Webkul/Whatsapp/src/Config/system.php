<?php

return [
    [
        'key'    => 'general.general.whatsapp',
        'name'   => 'whatsapp::app.whatsapp.title',
        'info'   => 'whatsapp::app.whatsapp.info',
        'sort'   => 20,

        'fields' => [
            [
                'name'       => 'whatsapp_phone_no',
                'title'      => 'whatsapp::app.whatsapp.title',
                'type'       => 'text',
                'validation' => 'max:100',
                'channel_based' => false,
                'locale_based'  => false,
            ],
        ],
    ],
];


