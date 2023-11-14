### install
1. ``git clone git@github.com:Naskalin/test_14_11_23.git``
2. ``php composer install``

### run tests
``php vendor/bin/pest``

### usage
```php
// create instance of api
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
```