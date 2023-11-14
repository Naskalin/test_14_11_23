<?php

namespace App\Resources;

use App\Requests\DeleteRequest;
use App\Requests\GetRequest;
use App\Requests\PutRequest;

class PostResource extends BaseResource
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function update(int $id, array $data): array
    {
        return (array)$this->connector->send(new PutRequest("/posts/$id", $data))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function delete(int $id): array
    {
        return $this->connector->send(new DeleteRequest("/posts/$id"))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function get(int $id): array
    {
        return (array)$this->connector->send(new GetRequest("/posts/$id"))->json();
    }
}