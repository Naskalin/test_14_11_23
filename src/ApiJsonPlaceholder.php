<?php

namespace App;

use App\Resources\PostResource;
use App\Resources\UserResource;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class ApiJsonPlaceholder extends Connector
{
    use AlwaysThrowOnErrors;

    public function resolveBaseUrl(): string
    {
        return 'https://jsonplaceholder.typicode.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        return [
            '_page' => 1,
        ];
    }

    public function users(): UserResource
    {
        return new UserResource($this);
    }

    public function posts(): PostResource
    {
        return new PostResource($this);
    }
}