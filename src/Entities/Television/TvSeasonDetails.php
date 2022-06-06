<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TvSeasonDetails extends DataTransferObject
{
    public int $id;

    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $air_date;

    #[CastWith(NullableStringCaster::class)]
    public ?string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $poster_path;
    public int $season_number;

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
