<?php

use App\ApiJsonPlaceholder;

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

it('a', function () {
    $api = new ApiJsonPlaceholder();
    $userId = 1;
    $pageNumber = 2;
    $postId = 3;

    // list users
    $api->users()->list();
    // or
    $api->users()->list($pageNumber);

    // list todos by userId
    $api->users()->listTodos($userId);
    //or
    $api->users()->listTodos($userId, $pageNumber);

    // list posts by userId
    $api->users()->listPosts($userId);
    //or
    $api->users()->listPosts($userId, $pageNumber);

    // create post
    $api->users()->createPost($userId, [
        'title' => 'Naskalin post',
        'userId' => 5,
        'body' => 'Lorem ipsum'
    ]);

    // get post
    $api->posts()->get($postId);

    // update post
    $api->posts()->update($postId, ['title' => 'Lorem ipsum']);

    // delete post
    $api->posts()->delete($postId);

    // more...

    // get user by id
    $api->users()->get($userId);

    // create user
    $api->users()->create([
        'name' => 'Naskalin',
        'username' => 'Michelle',
        'email' => 'test@example.com',
    ]);

    // update user
    $api->users()->update($userId, ['name' => 'NewName']);
});