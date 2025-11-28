<?php

namespace Webkul\Sms;

class Message
{
    public function __construct(public string $body, public ?string $from = null) {}
    public static function make(string $body, ?string $from = null): self { return new self($body, $from); }

    public function __toString(): string
    {
        if (method_exists($this, 'getText') && is_string($this->getText())) {
            return $this->getText();
        }
        foreach (['text', 'message', 'body', 'content'] as $prop) {
            if (property_exists($this, $prop) && is_string($this->$prop)) {
                return $this->$prop;
            }
        }
        return '';
    }
}