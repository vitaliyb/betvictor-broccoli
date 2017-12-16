# BetVictor Broccoli

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/armandsar/betvictor-broccoli/master.svg?style=flat-square)](https://travis-ci.org/armandsar/betvictor-broccoli)
[![Total Downloads](https://img.shields.io/packagist/dt/armandsar/betvictor-broccoli.svg?style=flat-square)](https://packagist.org/packages/armandsar/betvictor-broccoli)

Simple betvictor api client for Laravel 5.

## Install

Via Composer

``` bash
$ composer require armandsar/betvictor-broccoli
```

After updating composer, add the ServiceProvider to the providers array in config/app.php

```
Armandsar\BetVictorBroccoli\ServiceProvider::class,
```

or let Laravel autoload package if on >= 5.5

Publish api config

``` bash
$ php artisan vendor:publish
```

## Usage

``` php
$client = new Armandsar\BetVictorBroccoli\BetVictorClient();
```

or let Laravel do this by type hinting dependency in constructors or controller methods

## Available methods

Sports:
``` php
$client->sports();
```

``` php
$client->meetings($sportId);
```

``` php
$client->meetingEvents($sportId, $meetingId);
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
