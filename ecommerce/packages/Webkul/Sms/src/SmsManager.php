<?php

namespace Webkul\Sms;

use Illuminate\Support\Manager;
use Webkul\Sms\Contracts\SmsClient;
use Webkul\Sms\Drivers\AnchorSmsClient;

class SmsManager extends Manager implements SmsClient
{
    public function getDefaultDriver()
    {
        return //core()->getConfigData('general.sms.settings.driver')
           // ?: 
            config('sms.default', 'anchor');
    }

    public function createAnchorDriver(): SmsClient
    {
        // Read from config UI (general.sms.anchor.*) and fallback to sms.php
        $base = [
            'mode'        => core()->getConfigData('general.sms.anchor.mode'),
            'base'        => 'https://anchor-sms.com:8443',//core()->getConfigData('general.sms.anchor.base'),
            'from'        => core()->getConfigData('general.sms.anchor.from'),
            'dataCoding'  => core()->getConfigData('general.sms.anchor.dataCoding'),
            'user'        => 'the9sen',//core()->getConfigData('general.sms.anchor.user'),
            'pass'        => 'User12345!',
            'username'    => 'the9sen',//core()->getConfigData('general.sms.anchor.username'),
            'password'    => 'User12345!',//core()->getConfigData('general.sms.anchor.password'),
            'token_path'  => '/auth/getToken',//core()->getConfigData('general.sms.anchor.token_path'),
            'mt_path'     => '/mt/sendMtSms',//core()->getConfigData('general.sms.anchor.mt_path'),
            'mt_no_token_path' => '/mt/sendMtSmsNoToken',//core()->getConfigData('general.sms.anchor.mt_no_token'),
        ];

        $cfg = array_filter($base, fn($v) => $v !== null && $v !== '');
        $defaultFrom = core()->getConfigData('general.sms.settings.from') ?: config('sms.from');

        return new AnchorSmsClient($cfg, $defaultFrom);
    }

    public function send(string $to, Message|string $message, array $options = []): array
    {
        $msg = is_string($message) ? Message::make($message) : $message;
        return $this->driver()->send($to, $msg, $options);
    }
}
