<?php

namespace App\Models;

class User
{
    public int $id;
    public string $name;
    public string $username;
    public string $email;
    public Address $address;
    public string $phone;
    public string $website;
    public Company $company;

    public function __construct(
        int $id,
        string $name,
        string $username,
        string $email,
        array $address,
        string $phone,
        string $website,
        array $company
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->address = new Address(...$address);
        $this->phone = $phone;
        $this->website = $website;
        $this->company = new Company(...$company);
    }
}





