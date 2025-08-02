<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Entities\Common\AlternativeTitle;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\DetailedMedia;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Reviews\Review;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProviderList;
use Chiiya\Tmdb\Responses\ImagesResponse;
use DateTimeImmutable;

class MovieDetails extends DetailedMedia
{
    public function __construct(
        public bool $adult,
        public string $original_title,
        public string $title,
        public bool $video,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $release_date,
        public ?RelatedCollection $belongs_to_collection,
        public ?int $budget,
        public ?string $imdb_id,
        public int $revenue,
        public ?int $runtime,
        public ?Credits $credits,
        public ?ExternalIds $external_ids,
        public ?ImagesResponse $images,
        /** @var array<int, AlternativeTitle>|null */
        #[Cast(ArrayCaster::class, AlternativeTitle::class)]
        #[Map(from: 'alternative_titles.titles')]
        public array $alternative_titles = [],
        /** @var array<int, Keyword> */
        #[Cast(ArrayCaster::class, Keyword::class)]
        #[Map(from: 'keywords.keywords')]
        public array $keywords = [],
        /** @var array<int, Movie> */
        #[Cast(ArrayCaster::class, Movie::class)]
        #[Map(from: 'recommendations.results')]
        public array $recommendations = [],
        /** @var array<int, Movie> */
        #[Cast(ArrayCaster::class, Movie::class)]
        #[Map(from: 'similar.results')]
        public array $similar = [],
        /** @var array<string, ReleaseDateList> */
        #[Cast(ArrayCaster::class, ReleaseDateList::class)]
        public array $release_dates = [],
        /** @var array<int, Review> */
        #[Cast(ArrayCaster::class, Review::class)]
        #[Map(from: 'reviews.results')]
        public array $reviews = [],
        /** @var array<int, MovieTranslation> */
        #[Cast(ArrayCaster::class, MovieTranslation::class)]
        #[Map(from: 'translations.translations')]
        public array $translations = [],
        /** @var array<int, Video> */
        #[Cast(ArrayCaster::class, Video::class)]
        #[Map(from: 'videos.results')]
        public array $videos = [],
        /** @var array<string, WatchProviderList> */
        #[Cast(ArrayCaster::class, WatchProviderList::class)]
        public array $watch_providers = [],
        /** @var array<int, Change> */
        #[Cast(ArrayCaster::class, Change::class)]
        #[Map(from: 'changes.changes')]
        public array $changes = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
