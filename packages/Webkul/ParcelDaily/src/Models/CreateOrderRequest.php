<?php

namespace Webkul\ParcelDaily\Models;

class CreateOrderRequest
{
    public function __construct(
        public string  $serviceProvider,
        public Address $pickupAddress,
        public Address $clientAddress,
        public float   $kg,
        public int     $quantity,
        public float   $price,
        public ?float  $cod,            // null if non-COD
        public string  $content,
        public int     $content_value,
        public bool    $isDropoff,      // true when mode = dropoff
    ) {}

    public function toArray(): array
    {
        $payload = [
            'serviceProvider' => $this->serviceProvider,
            'pickupAddress'   => $this->pickupAddress->toArray(),
            'clientAddress'   => $this->clientAddress->toArray(),
            'kg'              => $this->kg,
            'quantity'        => $this->quantity,
            'price'           => $this->price,
            'content'         => $this->content,
            'content_value'   => $this->content_value,
            'isDropoff'       => $this->isDropoff,
        ];

        if ($this->cod !== null) {
            $payload['cod'] = $this->cod;
        }

        return $payload;
    }
}
