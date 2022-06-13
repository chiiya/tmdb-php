<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TvSeasonDetails extends TvSeason
{
    /** @var array<int, TvEpisode> */
    #[CastWith(ArrayCaster::class, TvEpisode::class)]
    public array $episodes;
    public ?AggregateCredits $aggregate_credits;
    public ?Credits $credits;
    public ?ExternalIds $external_ids;

    /** @var array<int, PosterImage>|null */
    #[CastWith(ArrayCaster::class, PosterImage::class)]
    #[MapFrom('images.posters')]
    public ?array $posters;

    /** @var array<int, TelevisionTranslation>|null */
    #[CastWith(ArrayCaster::class, TelevisionTranslation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;

    /** @var array<int, Video>|null */
    #[CastWith(ArrayCaster::class, Video::class)]
    #[MapFrom('videos.results')]
    public ?array $videos;
}
