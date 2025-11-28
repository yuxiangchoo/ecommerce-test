<?php

namespace Webkul\ParcelDaily\Models;

class Address
{
    public function __construct(
        public string $fullName,
        public string $countryCode,
        public string $phone,
        public string $email,
        public string $line1,
        public string $line2,
        public string $city,
        public string $postcode,
        public string $state,
        public string $country,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['fullName']    ?? '',
            $data['countryCode'] ?? '',
            $data['phone']       ?? '',
            $data['email']       ?? '',
            $data['line1']       ?? '',
            $data['line2']       ?? '',
            $data['city']        ?? '',
            $data['postcode']    ?? '',
            $data['state']       ?? '',
            $data['country']     ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'fullName'    => $this->fullName,
            'countryCode' => $this->countryCode,
            'phone'       => $this->phone,
            'email'       => $this->email,
            'line1'       => $this->line1,
            'line2'       => $this->line2,
            'city'        => $this->city,
            'postcode'    => $this->postcode,
            'state'       => $this->state,
            'country'     => $this->country,
        ];
    }
}
