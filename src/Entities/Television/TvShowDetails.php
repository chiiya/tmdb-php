<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use Chiiya\Tmdb\Entities\Common\AlternativeTitle;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\DetailedMedia;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Networks\Network;
use Chiiya\Tmdb\Entities\Reviews\Review;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;
use Chiiya\Tmdb\Entities\Television\Credits\CreatedBy;
use Chiiya\Tmdb\Entities\Television\EpisodeGroups\EpisodeGroupList;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProviderList;
use Chiiya\Tmdb\Responses\ImagesResponse;
use DateTimeImmutable;

class TvShowDetails extends DetailedMedia
{
    public function __construct(
        public string $original_name,
        public array $origin_country,
        public string $name,
        public bool $adult,
        public int $number_of_seasons,
        public string $type,
        public bool $in_production,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $first_air_date = null,
        #[Map(from: 'first_air_date')]
        #[Cast(ReleaseYearCaster::class)]
        public ?int $release_year = null,
        public ?int $number_of_episodes = null,
        public ?TvEpisode $last_episode_to_air = null,
        public ?TvEpisode $next_episode_to_air = null,
        public ?AggregateCredits $aggregate_credits = null,
        public ?Credits $credits = null,
        public ?ExternalIds $external_ids = null,
        public ?ImagesResponse $images = null,
        /** @var int[] */
        public array $episode_run_time = [],
        /** @var string[] */
        public array $languages = [],
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $last_air_date = null,
        /** @var array<int, Network> */
        #[Cast(ArrayCaster::class, Network::class)]
        public array $networks = [],
        /** @var array<int, CreatedBy> */
        #[Cast(ArrayCaster::class, CreatedBy::class)]
        public array $created_by = [],
        /** @var array<int, TvSeason> */
        #[Cast(ArrayCaster::class, TvSeason::class)]
        public array $seasons = [],
        /** @var array<int, AlternativeTitle>|null */
        #[Cast(ArrayCaster::class, AlternativeTitle::class)]
        #[Map(from: 'alternative_titles.results')]
        public array $alternative_titles = [],
        /** @var array<int, Change>|null */
        #[Cast(ArrayCaster::class, Change::class)]
        #[Map(from: 'changes.changes')]
        public array $changes = [],
        /** @var array<int, ContentRating>|null */
        #[Cast(ArrayCaster::class, ContentRating::class)]
        #[Map(from: 'content_ratings.results')]
        public array $content_ratings = [],
        /** @var array<int, EpisodeGroupList>|null */
        #[Cast(ArrayCaster::class, EpisodeGroupList::class)]
        #[Map(from: 'episode_groups.results')]
        public array $episode_groups = [],
        /** @var array<int, Keyword>|null */
        #[Cast(ArrayCaster::class, Keyword::class)]
        #[Map(from: 'keywords.results')]
        public array $keywords = [],
        /** @var array<int, TvShow>|null */
        #[Cast(ArrayCaster::class, TvShow::class)]
        #[Map(from: 'recommendations.results')]
        public array $recommendations = [],
        /** @var array<int, Review>|null */
        #[Cast(ArrayCaster::class, Review::class)]
        #[Map(from: 'reviews.results')]
        public array $reviews = [],
        /** @var array<int, ScreenedTheatrically>|null */
        #[Cast(ArrayCaster::class, ScreenedTheatrically::class)]
        #[Map(from: 'screened_theatrically.results')]
        public array $screened_theatrically = [],
        /** @var array<int, TvShow>|null */
        #[Cast(ArrayCaster::class, TvShow::class)]
        #[Map(from: 'similar.results')]
        public array $similar = [],
        /** @var array<int, Video>|null */
        #[Cast(ArrayCaster::class, Video::class)]
        #[Map(from: 'videos.results')]
        public array $videos = [],
        /** @var array<string, WatchProviderList>|null */
        #[Cast(ArrayCaster::class, WatchProviderList::class)]
        public array $watch_providers = [],
        /** @var array<int, TelevisionTranslation>|null */
        #[Cast(ArrayCaster::class, TelevisionTranslation::class)]
        #[Map(from: 'translations.translations')]
        public array $translations = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
