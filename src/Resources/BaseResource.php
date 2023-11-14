<?php

namespace App\Resources;

use Saloon\Http\Connector;

abstract class BaseResource
{
    public function __construct(protected Connector $connector)
    {
    }

}