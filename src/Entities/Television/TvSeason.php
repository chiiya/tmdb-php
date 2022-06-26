<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class TvSeason extends DataTransferObject
{
    public int $id;
    public int $season_number;
    public ?int $episode_count;

    #[CastWith(NullableStringCaster::class)]
    public ?string $poster_path;

    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $air_date;

    #[MapFrom('air_date')]
    #[CastWith(ReleaseYearCaster::class)]
    public ?int $release_year;

    #[CastWith(NullableStringCaster::class)]
    public ?string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;
}
