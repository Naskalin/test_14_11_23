<?php

use App\ApiJsonPlaceholder;
use App\Factories\UserFactory;
use App\Models\User;

function api(): ApiJsonPlaceholder
{
    return new ApiJsonPlaceholder();
}

it('create user', function () {
    $body = <<<JSON
{
    "name": "Naskalin",
    "username": "Michelle",
    "email": "test@example.com",
    "address": {
        "street": "Kulas Light",
        "suite": "Apt. 556",
        "city": "Gwenborough",
        "zipcode": "92998-3874",
        "geo": { "lat": "-37.3159", "lng": "81.1496" }
    },
    "phone": "1-770-736-8031 x56442",
    "website": "hildegard.org",
    "company": {
        "name": "Romaguera-Crona",
        "catchPhrase": "Multi-layered client-server neural-net",
        "bs": "harness real-time e-markets"
    }
}
JSON;
    $resp = api()->users()->create(\json_decode($body, true));
    expect($resp)->toBeArray();
    expect($resp['name'])->toEqual('Naskalin');
});

it('list users', function () {
    expect(api()->users()->list())->toBeArray();
});

it('get user', function () {
    expect(api()->users()->get(5))->toBeArray();
});

it('delete user', function () {
    expect(empty(api()->users()->delete(5)))->toBeTrue();
});

it('update user', function () {
    $resp = api()->users()->update(5, ['name' => 'Cat']);
    expect($resp)->toBeArray();
    expect($resp['name'])->toEqual('Cat');
});

it('patch user', function () {
    $resp = api()->users()->update(5, ['name' => 'Dog']);
    expect($resp)->toBeArray();
    expect($resp['name'])->toEqual('Dog');
});

it('list user posts', function () {
    expect(api()->users()->listPosts(5))->toBeArray();
});

it('create user post', function () {
    $resp = api()->users()->createPost(5, [
        'title' => 'Naskalin post',
        'userId' => 5,
        'body' => 'Lorem ipsum'
    ]);
    expect($resp)->toBeArray();
    expect($resp['title'])->toEqual('Naskalin post');
    expect($resp['userId'])->toEqual(5);
});

it('list user todos', function () {
    expect(api()->users()->listTodos(5))->toBeArray();
});

it('user factory', function () {
   $resp = api()->users()->get(1);
   $user = UserFactory::new($resp);
   expect($user)->toBeInstanceOf(User::class);
});

it('user factory list', function () {
    $resp = api()->users()->list();
    $users = UserFactory::collection($resp);
    expect($users)->toBeArray();
    expect($users)->not()->toBeEmpty();
    expect($users[1])->toBeInstanceOf(User::class);
});