**Note: this package is under active development. While it should be completely functional, caution is advised and you might wish to wait until the first release is pushed out. Until then, things are likely to change and possibly break as features are added or altered.**

If you encounter any issues or have a suggestion, please [create an issue](https://github.com/Team-Tea-Time/laravel-counter/issues/new).

## Installation

### Step 1: Install the package

Add the package to your composer.json and run `composer update`:

```
"teamteatime/laravel-counter": "dev-master"
```

Add the service provider to your `config/app.php`:

```php
'TeamTeaTime\Counter\CounterServiceProvider',
```

> If your app defines a catch-all route, make sure you load this service provider before your app service providers.

### Step 2: Publish the package files

Run the vendor:publish command to publish Filer's migrations:

`php artisan vendor:publish`

### Step 3: Update your database

Run your migrations:

`php artisan migrate`

### Step 4: Update your models

Add counter support to your models by using the HasCounters trait:

```php
class ... extends Eloquent {
    use \TeamTeaTime\Counter\HasCounters;
}
```

## Configuration

Filer requires no configuration out of the box in most cases, but the following options are available to you in `config/counter.php`:

Option | Type | Description | Default
------ | ---- | ----------- | -------
user | Array | The name of your app's User model, and a closure to return the user ID. These are used to associate counter activity with users. | auth()->user()->id or 0

## Usage
