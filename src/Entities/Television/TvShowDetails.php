<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Entities\Common\AlternativeTitle;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Common\HasMediaDetails;
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
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TvShowDetails extends DataTransferObject
{
    use HasMediaAttributes;
    use HasMediaDetails;
    use HasTvAttributes;
    public bool $adult;
    public int $number_of_episodes;
    public int $number_of_seasons;
    public string $type;
    public bool $in_production;
    public ?TvEpisode $last_episode_to_air;
    public ?TvEpisode $next_episode_to_air;

    /** @var int[] */
    public array $episode_run_time;

    /** @var string[] */
    public array $languages;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $last_air_date;

    /** @var array<int, Network> */
    #[CastWith(ArrayCaster::class, Network::class)]
    public array $networks;

    /** @var array<int, CreatedBy> */
    #[CastWith(ArrayCaster::class, CreatedBy::class)]
    public array $created_by;

    /** @var array<int, TvSeason> */
    #[CastWith(ArrayCaster::class, TvSeason::class)]
    public array $seasons;
    public ?AggregateCredits $aggregate_credits;
    public ?Credits $credits;
    public ?ExternalIds $external_ids;
    public ?ImagesResponse $images;

    /** @var array<int, AlternativeTitle>|null */
    #[CastWith(ArrayCaster::class, AlternativeTitle::class)]
    #[MapFrom('alternative_titles.results')]
    public ?array $alternative_titles;

    /** @var array<int, Change>|null */
    #[CastWith(ArrayCaster::class, Change::class)]
    #[MapFrom('changes.changes')]
    public ?array $changes;

    /** @var array<int, ContentRating>|null */
    #[CastWith(ArrayCaster::class, ContentRating::class)]
    #[MapFrom('content_ratings.results')]
    public ?array $content_ratings;

    /** @var array<int, EpisodeGroupList>|null */
    #[CastWith(ArrayCaster::class, EpisodeGroupList::class)]
    #[MapFrom('episode_groups.results')]
    public ?array $episode_groups;

    /** @var array<int, Keyword>|null */
    #[CastWith(ArrayCaster::class, Keyword::class)]
    #[MapFrom('keywords.results')]
    public ?array $keywords;

    /** @var array<int, TvShow>|null */
    #[CastWith(ArrayCaster::class, TvShow::class)]
    #[MapFrom('recommendations.results')]
    public ?array $recommendations;

    /** @var array<int, Review>|null */
    #[CastWith(ArrayCaster::class, Review::class)]
    #[MapFrom('reviews.results')]
    public ?array $reviews;

    /** @var array<int, ScreenedTheatrically>|null */
    #[CastWith(ArrayCaster::class, ScreenedTheatrically::class)]
    #[MapFrom('screened_theatrically.results')]
    public ?array $screened_theatrically;

    /** @var array<int, TvShow>|null */
    #[CastWith(ArrayCaster::class, TvShow::class)]
    #[MapFrom('similar.results')]
    public ?array $similar;

    /** @var array<int, Video>|null */
    #[CastWith(ArrayCaster::class, Video::class)]
    #[MapFrom('videos.results')]
    public ?array $videos;

    /** @var array<string, WatchProviderList>|null */
    #[CastWith(ArrayCaster::class, WatchProviderList::class)]
    public ?array $watch_providers;

    /** @var array<int, TelevisionTranslation>|null */
    #[CastWith(ArrayCaster::class, TelevisionTranslation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;
}
