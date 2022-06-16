# TMDB PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chiiya/tmdb-php.svg?style=flat-square)](https://packagist.org/packages/chiiya/tmdb-php)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/chiiya/tmdb-php/lint?label=code%20style)](https://github.com/chiiya/tmdb-php/actions?query=workflow%3Alint+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/chiiya/tmdb-php.svg?style=flat-square)](https://packagist.org/packages/chiiya/tmdb-php)

PHP SDK for the TMDB API.

_Looking for a Laravel package? Check out `chiiya/laravel-tmdb`._

## Features
- Complete coverage of _all_ non-user related APIv3 endpoints (see [here](#api-coverage))
- Strongly typed API responses

## Installation

Install the package via composer:

```bash
composer require chiiya/tmdb-php
```

You will also need to create a v4 auth token for the TMDB API. You can find it under 
`API > API Read Access Token` in your TMDB account settings.

## Usage
 
Create an authenticated client, then use a repository with the client you just created:

```php
use Chiiya\Tmdb\Http\Client;
use Chiiya\Tmdb\Repositories\MovieRepository;

$client = Client::createAuthenticatedClient('your_v4_bearer_token');
$repository = new MovieRepository($client);
$movie = $repository->getMovie(550);
dump($movie->title); // "Fight Club"

$repository->getPopular();
$repository->getNowPlaying();
// ...
```

## API Coverage

This package covers all non-account-related API endpoints. Specifically, this means that _all_ V3 endpoints
except for the following ones are supported:

- Account > `*`
- Authentication > `*`
- Guest Sessions > `*`
- Lists > `*`
- `*` > Get Account States
- `*` > Rate Movie/TV
- `*` > Delete Rating
- `*` > Get Lists

Similarly, no v4 API endpoints are covered.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
