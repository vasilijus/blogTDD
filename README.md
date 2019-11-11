# Setup

cp .env.example .env

mysql:

```
mysql> create database laravel_testing_blogTDD;
Query OK, 1 row affected (0.01 sec)
```
## edit .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_testing_blogTDD
DB_USERNAME=testuser
DB_PASSWORD=password
```
## Composer 
```
composer install
```

## Generate key .Copy the key to .env File
```
php artisan key:generate
```

## Populate Dabase with fake links (seed)
```
php artisan migrate:fresh --seed
```


