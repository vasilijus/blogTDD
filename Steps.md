# Laravel CMD Line Installer

```
composer global require "laravel/installer"

laravel new links
```

## Auth

```
composer require laravel/ui --dev

php artisan ui vue --auth
```

## Building a List of Links

```
php artisan make:migration create_links_table --create=links

```

Now, open the file create_links_table.php.

```
Schema::create('links', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->string('url')->unique();
      $table->text('description');
      $table->timestamps();
});
```

```
php artisan migrate
```

### While you are working with test data, you can quickly apply the schema:

```
php artisan migrate:fresh
```

 we need some data and a model to work with our database table. Laravel provides two features which help with this: the first is a database seeder, which populates the database with data, and second, the model factory files that allow us to generate fake model data that we can use to fill our development database and tests:

```
php artisan make:model --factory Link
```


The --factory flag will generate a new factory file in the database/factories path, in our case a new LinkFactory file will include an empty factory definition for our Link model.

Open the LinkFactory.php file and fill in the following:

```
<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'url' => $faker->url,
        'description' => $faker->paragraph,
    ];
});
```

### Restart the server if running









## Submitting the Form
With the form in place, we are ready to handle the POST data and validate data. Back in the routes/web.php file, create another route for the POST request:

use Illuminate\Http\Request;

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new App\Link($data))->save();

    return redirect('/');
});

> Next, we use the tap() helper function to create a new Link model instance and then save it. Using tap allows us to call save() and still return the model instance after the save.
```
OR USE :
$link = new \App\Link($data);
$link->save();

return $link;
```



Common issue on post validation 
```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description'
    ];
}
```
### If we wanted to prevent mass-assignment, this is how our code would look:
```
$data = $request->validate([
    'title' => 'required|max:255',
    'url' => 'required|url|max:255',
    'description' => 'required|max:255',
]);

$link = new \App\Link;
$link->title = $data['title'];
$link->url = $data['url'];
$link->description = $data['description'];

// Save the model
$link->save();
```


## Testing the Form Submission

Before we get started, we need to adjust a few things in our phpunit.xml file so that we can use an in-memory SQLite database. You will need to make sure that you have the proper PHP modules installed.
```
<php>
        <!-- ... -->
    <env name="DB_CONNECTION" value="sqlite"/>
    <env name="DB_DATABASE" value=":memory:"/>
        <!-- ... -->
</php>
```
Next, remove the placeholder test that ships with Laravel:
```
rm tests/Feature/ExampleTest.php
```

We are ready to start testing the /submit form through HTTP requests to make sure that the route validation, saving, and redirecting are working as expected.

First, let’s create a new feature test to test against our route:
```
php artisan make:test SubmitLinksTest
```

```
function guest_can_submit_a_new_link()
function link_is_not_created_if_validation_fails()
function link_is_not_created_with_invalid_url()
function max_length_fails_when_too_long()
function max_length_fails_when_under_max()
```

### Test fails, always 500 where 200 expected
```
class SubmitLinksTest extends TestCase
{
    use RefreshDatabase;
```