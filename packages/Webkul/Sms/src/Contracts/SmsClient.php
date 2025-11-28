<?php

declare(strict_types=1);

namespace Webkul\Sms\Contracts;

use Webkul\Sms\Message;

interface SmsClient
{
    public function send(string $to, Message|string $message, array $options = []): array;
}