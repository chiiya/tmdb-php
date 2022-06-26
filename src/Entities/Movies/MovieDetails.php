<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\AlternativeTitle;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Common\HasMediaDetails;
use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Reviews\Review;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProviderList;
use Chiiya\Tmdb\Responses\ImagesResponse;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class MovieDetails extends DataTransferObject
{
    use HasMediaAttributes;
    use HasMediaDetails;
    use HasMovieAttributes;
    public ?RelatedCollection $belongs_to_collection;
    public ?int $budget;
    public ?string $imdb_id;
    public int $revenue;
    public ?int $runtime;

    /** @var array<int, AlternativeTitle>|null */
    #[CastWith(ArrayCaster::class, AlternativeTitle::class)]
    #[MapFrom('alternative_titles.titles')]
    public ?array $alternative_titles;
    public ?Credits $credits;
    public ?ExternalIds $external_ids;
    public ?ImagesResponse $images;

    /** @var array<int, Keyword>|null */
    #[CastWith(ArrayCaster::class, Keyword::class)]
    #[MapFrom('keywords.keywords')]
    public ?array $keywords;

    /** @var array<int, Movie>|null */
    #[CastWith(ArrayCaster::class, Movie::class)]
    #[MapFrom('recommendations.results')]
    public ?array $recommendations;

    /** @var array<int, Movie>|null */
    #[CastWith(ArrayCaster::class, Movie::class)]
    #[MapFrom('similar.results')]
    public ?array $similar;

    /** @var array<string, ReleaseDateList>|null */
    #[CastWith(ArrayCaster::class, ReleaseDateList::class)]
    public ?array $release_dates;

    /** @var array<int, Review>|null */
    #[CastWith(ArrayCaster::class, Review::class)]
    #[MapFrom('reviews.results')]
    public ?array $reviews;

    /** @var array<int, MovieTranslation>|null */
    #[CastWith(ArrayCaster::class, MovieTranslation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;

    /** @var array<int, Video>|null */
    #[CastWith(ArrayCaster::class, Video::class)]
    #[MapFrom('videos.results')]
    public ?array $videos;

    /** @var array<string, WatchProviderList>|null */
    #[CastWith(ArrayCaster::class, WatchProviderList::class)]
    public ?array $watch_providers;

    /** @var array<int, Change>|null */
    #[CastWith(ArrayCaster::class, Change::class)]
    #[MapFrom('changes.changes')]
    public ?array $changes;
}
