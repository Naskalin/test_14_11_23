<?php

it('get post', function () {
    expect(api()->posts()->get(5))->toBeArray();
});

it('update post', function () {
    $resp = api()->posts()->update(5, ['title' => 'New Title']);
    expect($resp)->toBeArray();
    expect($resp['title'])->toEqual('New Title');
});

it('delete post', function () {
    expect(empty(api()->posts()->delete(5)))->toBeTrue();
});