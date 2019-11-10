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