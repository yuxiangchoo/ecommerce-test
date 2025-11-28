<?php

namespace Webkul\ParcelDaily\Models;

class QuoteRequest
{
    public string $origin;
    public string $destination;
    public float $weight;
    public string $originCountry;
    public string $destinationCountry;
    public ?float $codAmount; // Nullable


    public function __construct(string $origin, string $destination, float $weight, string $originCountry, string $destinationCountry, ?float $codAmount = null)
    {
        $this->origin      = $origin;
        $this->destination = $destination;
        $this->weight      = $weight;
        $this->originCountry = $originCountry;
        $this->destinationCountry = $destinationCountry;
        $this->codAmount   = $codAmount;
    }

    /**
     * Convert to array for API payload
     */
    public function toArray(): array
    {
        $payload = [
            'origin'             => $this->origin,
            'destination'        => $this->destination,
            'weight'             => $this->weight,
            'originCountry'      => $this->originCountry,
            'destinationCountry' => $this->destinationCountry,
        ];

        if ($this->codAmount !== null) {
            $payload['cod'] = $this->codAmount;
        }

        return $payload;
    }
}
