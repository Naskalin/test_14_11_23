<?php

namespace App\Resources;

use App\Requests\DeleteRequest;
use App\Requests\GetRequest;
use App\Requests\PostRequest;
use App\Requests\PutRequest;

class UserResource extends BaseResource
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function list(int $page = 1): array
    {
        return (array)$this->connector->send(request: new GetRequest('/users', ['_page' => max($page, 1)]))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function get(int $id): array
    {
        return (array)$this->connector->send(new GetRequest("/users/$id"))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function create(array $data): array
    {
        return (array)$this->connector->send(new PostRequest('/users', $data))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function update(int $id, array $data): array
    {
        return (array)$this->connector->send(new PutRequest("/users/$id", $data))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function delete(int $id): array
    {
        return $this->connector->send(new DeleteRequest("/users/$id"))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function listPosts(int $userId, int $page = 1): array
    {
        return $this->connector->send(new GetRequest("/users/$userId/posts", ['_page' => max($page, 1)]))->json();
    }

    public function createPost(int $userId, array $data): array
    {
        return (array)$this->connector->send(new PostRequest("/users/$userId/posts", $data))->json();
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     * @throws \JsonException
     */
    public function listTodos(int $userId, int $page = 1): array
    {
        return $this->connector->send(new GetRequest("/users/$userId/todos", ['_page' => max($page, 1)]))->json();
    }
}