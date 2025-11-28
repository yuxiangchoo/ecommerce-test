<?php

return [
    [
        'key'      => 'general.sms',
        'name'     => 'sms::app.menu.title',
        'info'     => 'sms::app.menu.info',
        'sort'     => 50,
        'children' => [
            [
                'key'    => 'general.sms.settings',
                'name'   => 'sms::app.menu.settings',
                'sort'   => 1,
                'fields' => [
                    [
                        'name'          => 'driver',
                        'title'         => 'sms::app.fields.driver',
                        'type'          => 'select',
                        'options'       => [
                            ['title' => 'Anchor', 'value' => 'anchor'],
                        ],
                        'validation'    => 'required|in:anchor',
                        'channel_based' => false,
                        'locale_based'  => false,
                    ],
                    [
                        'name'          => 'from',
                        'title'         => 'sms::app.fields.from',
                        'type'          => 'text',
                        'validation'    => 'nullable|string|max:20',
                        'channel_based' => false,
                        'locale_based'  => false,
                    ],
                ],
            ],
            [
                'key'    => 'general.sms.anchor',
                'name'   => 'sms::app.anchor.title',
                'sort'   => 2,
                'fields' => [
                    [
                        'name'       => 'mode',
                        'title'      => 'sms::app.anchor.mode',
                        'type'       => 'select',
                        'options'    => [
                            ['title' => 'No Token (Query Auth)', 'value' => 'no_token'],
                            ['title' => 'Token (Bearer)',        'value' => 'token'],
                        ],
                        'validation' => 'required|in:no_token,token',
                    ],
                    ['name'=>'base','title'=>'sms::app.anchor.base','type'=>'text','default_value'=>'https://anchorsms.com:8443','validation'=>'required|url'],
                    ['name'=>'from','title'=>'sms::app.anchor.from','type'=>'text','validation'=>'nullable|string|max:20'],
                    ['name'=>'dataCoding','title'=>'sms::app.anchor.dataCoding','type'=>'select','options'=>[
                        ['title'=>'0 (ASCII)','value'=>'0'], ['title'=>'8 (Unicode)','value'=>'8'],
                    ],'validation'=>'required|in:0,8'],
                    ['name'=>'user','title'=>'sms::app.anchor.user','type'=>'text','validation'=>'nullable|string|max:255'],
                    ['name'=>'pass','title'=>'sms::app.anchor.pass','type'=>'password','validation'=>'nullable|string|max:255'],
                    ['name'=>'username','title'=>'sms::app.anchor.username','type'=>'text','validation'=>'nullable|string|max:255'],
                    ['name'=>'password','title'=>'sms::app.anchor.password','type'=>'password','validation'=>'nullable|string|max:255'],
                    ['name'=>'token_path','title'=>'sms::app.anchor.token_path','type'=>'text','default_value'=>'/auth/getToken','validation'=>'nullable|string'],
                    ['name'=>'mt_path','title'=>'sms::app.anchor.mt_path','type'=>'text','default_value'=>'/mt/sendMtSms','validation'=>'nullable|string'],
                    ['name'=>'mt_no_token','title'=>'sms::app.anchor.mt_no_token','type'=>'text','default_value'=>'/mt/sendMtSmsNoToken','validation'=>'nullable|string'],
                ],
            ],
        ],
    ],
];
