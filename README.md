Laravel 5 Hashids
=================

Laravel 5 wrapper for [Hashids](http://hashids.org). [Hashids](http://hashids.org) is a small open-source library that generates short, unique, non-sequential ids from numbers.

```php
// Encode integer.
Hashids::encode(167);

// Decode strings.
Hashids::decode('HashString');

// Dependency injection example.
$hashids->encode(2113);
```

[![Latest Version](https://img.shields.io/github/release/swiggles/laravel-hashids.svg?style=flat)](https://github.com/swiggles/hashids/releases)

## Installation
Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
composer require swiggles/laravel-hashids
```

Add the service provider to ```config/app.php``` in the `providers` array.

```php
'Swiggles\Hashids\HashidsServiceProvider'
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in ```config/app.php``` to your aliases array.

```php
'Hashids' => 'Swiggles\Hashids\Facades\Hashids'
```

## Configuration

Laravel Hashids configuration can be customised if necessary. Publish the vendor assets to do so:

```bash
php artisan vendor:publish
```

This will create a `config/hashids.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

## Usage

#### Swiggles\Hashids\HashGenerator

This is the interface used for dependency injection. It is bound to the `Swiggles\Hashids\Hashids` class and the `hashids` alias.

#### Swiggles\Hashids\Hashids

This is the class wrapping `Hashids\Hashids` which is part of the [Hashids](https://packagist.org/packages/hashids/hashids) package.
It is bound to the ioc container as `hashids` and can be accessed using the `Facades\Hashids` facade.

#### HashidsServiceProvider

This class contains no public methods of interest. This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples
Here you can see an example of just how simple this package is to use.

```php
// You can alias this in config/app.php.
use Swiggles\Hashids\Facades\Hashids;

Hashids::encode(167);
Hashids::decode('SomeHash');
```

More functionality is available. The Facade will behave like it is an instance of `Swiggles\Hashids\Hashids`.

If you prefer to use dependency injection over facades like me, then you can inject the `Swiggles\Hashids\HashGenerator` interface directly:

```php
use Swiggles\Hashids\HashGenerator;

class Foo
{
	protected $hashids;

	public function __construct(HashGenerator $hashids)
	{
		$this->hashids = $hashids;
	}

	public function bar($id)
	{
		$this->hashids->encode($id)
	}
}
```

## Documentation

There are other classes in this package that are not documented here. This is because the package is a Laravel wrapper of [Ivan Akimov's](https://github.com/ivanakimov) [Hashids package](https://github.com/ivanakimov/hashids.php).

## Credits

Inspiration for this package was from [Vincent Klaiber's](https://github.com/vinkla) [Laravel 5 Hashids package](https://github.com/vinkla/hashids). I have removed the manager stuff to simplify it as i didn't need that functionality.

## License

Laravel Hashids is licensed under [The MIT License (MIT)](LICENSE).
