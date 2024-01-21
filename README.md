# How to install this project in you machine:

1. Clone this repository

2. Install the dependencies

```
composer install
```

3. Create a database and configure the .env file

4. Run the migrations

```
php artisan migrate
```


5. Create a symbolic link from public/storage to storage/app/public

```
php artisan storage:link
```

6. Run the server

```
php artisan serve
```
