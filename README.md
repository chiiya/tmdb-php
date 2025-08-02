![TMDB PHP](./.github/tmdb-php.png)

<p align="center">
    <a href="https://packagist.org/packages/chiiya/tmdb-php" target="_blank"><img src="https://img.shields.io/packagist/v/chiiya/tmdb-php.svg?style=flat-square"></a>
    <a href="https://github.com/chiiya/tmdb-php/actions?query=workflow%3Alint+branch%3Amaster" target="_blank"><img src="https://img.shields.io/github/actions/workflow/status/chiiya/tmdb-php/php-cs-fixer.yml?branch=master"></a>
    <a href="[#quality-assurance](https://packagist.org/packages/chiiya/tmdb-php)" target="_blank"><img src="https://img.shields.io/packagist/dt/chiiya/tmdb-php.svg?style=flat-square"></a>
</p>

A strongly-typed PHP SDK for the TMDB (The Movie Database) API, providing complete coverage of all
non-user related APIv3 endpoints with full type safety and IDE autocompletion support.

_Looking for a Laravel package? Check out `chiiya/laravel-tmdb`._

## Index

<pre>
<a href="#installation">> Installation</a>
<a href="#quick-start">> Quickstart</a>
<a href="#core-concepts">> Core Concepts</a>
<a href="#repositories">> Repositories</a>
<a href="#query-parameters">> Query Parameters</a>
<a href="#faq">> FAQ</a>
<a href="#changelog">> Changelog</a>
<a href="#contributing">> Contributing</a>
<a href="#license">> License</a>
</pre>

## Installation

Install the package via Composer:

```bash
composer require chiiya/tmdb-php
```

### Requirements

- PHP 8.2 or higher
- TMDB API v4 access token

### API Token Setup

You need to create a v4 auth token for the TMDB API. You can find it under
`API > API Read Access Token` in your TMDB account settings.

## Quick Start

```php
use Chiiya\Tmdb\Http\Client;
use Chiiya\Tmdb\Repositories\MovieRepository;

// Create an authenticated client
$client = Client::createAuthenticatedClient('your_v4_bearer_token');

// Create a repository
$repository = new MovieRepository($client);

// Get movie details
$movie = $repository->getMovie(550);
echo $movie->title; // "Fight Club"
echo $movie->overview; // Movie description
echo $movie->release_date->format('Y-m-d'); // "1999-10-15"
```

## Core Concepts

### Architecture

The library follows a repository pattern where each API domain has its own repository class:

- **Repositories**: Handle API calls and return strongly-typed entities
- **Entities**: Represent API response data with full type safety
- **Query Parameters**: Provide type-safe parameter objects for API requests
- **Responses**: Paginated response wrappers for list endpoints

## Repositories

The library provides repositories for all major TMDB API domains:

### MovieRepository

Handles all movie-related API endpoints.

```php
use Chiiya\Tmdb\Repositories\MovieRepository;

$repository = new MovieRepository($client);

$movie = $repository->getMovie(550);
$credits = $repository->getCredits(550);
$images = $repository->getImages(550);
$videos = $repository->getVideos(550);
$reviews = $repository->getReviews(550);
$similar = $repository->getSimilarMovies(550);
$recommendations = $repository->getRecommendations(550);
$externalIds = $repository->getExternalIds(550);
$titles = $repository->getAlternativeTitles(550);
$keywords = $repository->getKeywords(550);
$releaseDates = $repository->getReleaseDates(550);
$translations = $repository->getTranslations(550);
$watchProviders = $repository->getWatchProviders(550);
$changes = $repository->getChanges(550);
$popular = $repository->getPopular();
$nowPlaying = $repository->getNowPlaying();
$topRated = $repository->getTopRated();
$upcoming = $repository->getUpcoming();
$latest = $repository->getLatest();
```

### TvShowRepository

Handles all TV show-related API endpoints.

```php
use Chiiya\Tmdb\Repositories\TvShowRepository;

$repository = new TvShowRepository($client);

$show = $repository->getTvShow(1399); // Game of Thrones
$credits = $repository->getCredits(1399);
$aggregateCredits = $repository->getAggregateCredits(1399);
$images = $repository->getImages(1399);
$videos = $repository->getVideos(1399);
$reviews = $repository->getReviews(1399);
$similar = $repository->getSimilar(1399);
$recommendations = $repository->getRecommendations(1399);
$externalIds = $repository->getExternalIds(1399);
$titles = $repository->getAlternativeTitles(1399);
$keywords = $repository->getKeywords(1399);
$translations = $repository->getTranslations(1399);
$watchProviders = $repository->getWatchProviders(1399);
$changes = $repository->getChanges(1399);
$contentRatings = $repository->getContentRatings(1399);
$episodeGroups = $repository->getEpisodeGroups(1399);
$screenedTheatrically = $repository->getScreenedTheatrically(1399);
$popular = $repository->getPopular();
$airingToday = $repository->getAiringToday();
$onTheAir = $repository->getOnTheAir();
$topRated = $repository->getTopRated();
$latest = $repository->getLatest();
```

### Other Repositories

The library also includes repositories for:

- **SearchRepository**: Search endpoints
- **PersonRepository**: People/actors information
- **TvSeasonRepository**: TV season details
- **TvEpisodeRepository**: TV episode details
- **CompanyRepository**: Production companies
- **CollectionRepository**: Movie collections
- **GenreRepository**: Movie and TV genres
- **KeywordRepository**: Keywords
- **ReviewRepository**: Reviews
- **CreditRepository**: Credits
- **ConfigurationRepository**: API configuration
- **CertificationRepository**: Content ratings
- **ChangeRepository**: Recent changes
- **BrowseRepository**: Browse endpoints
- **WatchProviderRepository**: Streaming providers
- **NetworkRepository**: TV networks

## Query Parameters

The library provides type-safe query parameter objects for API requests. All parameters implement
the `QueryParameterInterface`.

### Common Parameters

```php
use Chiiya\Tmdb\Query\Language;
use Chiiya\Tmdb\Query\Page;
use Chiiya\Tmdb\Query\IncludeAdult;
use Chiiya\Tmdb\Query\Region;
use Chiiya\Tmdb\Query\Year;
use Chiiya\Tmdb\Query\PrimaryReleaseYear;
use Chiiya\Tmdb\Query\FirstAirDateYear;
use Chiiya\Tmdb\Query\StartDate;
use Chiiya\Tmdb\Query\EndDate;
use Chiiya\Tmdb\Query\ExternalSource;
use Chiiya\Tmdb\Query\AppendToResponse;

// Language parameter
$language = new Language('en-US');

// Pagination
$page = new Page(1);

// Include adult content
$includeAdult = new IncludeAdult(true);

// Region for watch providers
$region = new Region('US');

// Year filters
$year = new Year(2023);
$primaryReleaseYear = new PrimaryReleaseYear(2023);
$firstAirDateYear = new FirstAirDateYear(2023);

// Date ranges
$startDate = new StartDate('2023-01-01');
$endDate = new EndDate('2023-12-31');

// External source
$externalSource = new ExternalSource('imdb_id');

// Append additional data to response
$appendToResponse = new AppendToResponse([
    AppendToResponse::IMAGES,
    AppendToResponse::CREDITS,
    AppendToResponse::WATCH_PROVIDERS,
]);
```

### Using Parameters

```php
// Get movie with additional data
$movie = $repository->getMovie(550, [
    new Language('en-US'),
    new AppendToResponse([
        AppendToResponse::IMAGES,
        AppendToResponse::CREDITS,
        AppendToResponse::WATCH_PROVIDERS,
    ]),
]);

// Search with parameters
$movies = $repository->searchMovies('action', [
    new Language('en-US'),
    new Page(1),
    new IncludeAdult(false),
    new Year(2023),
]);
```

## FAQ

### How do I handle API rate limits?

The library handles rate limiting by sleeping for the necessary time (indicated by the `retry-after`
header) when a rate limit error occurs. However, you should ensure your application stays within
TMDB's rate limits to avoid hitting them frequently.

### Can I use this with Laravel?

Yes, but this is a standalone library. For Laravel integration, check out `chiiya/laravel-tmdb`.

### How do I get streaming provider information?

Use the `AppendToResponse::WATCH_PROVIDERS` parameter when getting movie or TV show details:

```php
$movie = $repository->getMovie(550, [
    new AppendToResponse([AppendToResponse::WATCH_PROVIDERS]),
]);

// Access by country code
if (isset($movie->watch_providers['US'])) {
    $providers = $movie->watch_providers['US'];
}
```

### How do I get images with different sizes?

Images are returned with file paths. You need to construct the full URL using TMDB's image base URL:

```php
$imageBaseUrl = 'https://image.tmdb.org/t/p/';
$size = 'w500'; // or 'original', 'w780', etc.
$fullUrl = $imageBaseUrl . $size . $movie->poster_path;
```

### How do I handle pagination?

List responses include pagination information:

```php
$movies = $repository->getPopular([new Page(1)]);

echo $movies->page; // Current page
echo $movies->total_pages; // Total pages
echo $movies->total_results; // Total results

// Access results
foreach ($movies->results as $movie) {
    echo $movie->title;
}

// Does the response have more pages?
$movies->hasMorePages(); // Returns true if there are more pages

// Get next page
$movies->getNextPageNumber();
```

### What API endpoints are not covered?

This library covers all non-account-related API endpoints. Specifically excluded are:

- Account-related endpoints
- Authentication endpoints
- Guest Sessions
- Lists
- Account States
- Rating endpoints
- v4 API endpoints

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
