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
