<?php

namespace App\Models;

class Address
{
    public string $street;
    public string $suite;
    public string $city;
    public string $zipcode;
    public Geo $geo;

    public function __construct(
        string $street,
        string $suite,
        string $city,
        string $zipcode,
        array $geo
    ) {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->geo = new Geo(...$geo);
    }
}