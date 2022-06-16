<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

trait HasEpisodeAttributes
{
    public int $id;
    public int $episode_number;
    public int $season_number;
    public int $vote_count;

    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $air_date;

    #[MapFrom('first_air_date')]
    #[CastWith(ReleaseYearCaster::class)]
    public ?int $release_year;

    #[CastWith(NullableStringCaster::class)]
    public ?string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $production_code;

    #[CastWith(NullableStringCaster::class)]
    public ?string $still_path;

    #[CastWith(NullableFloatCaster::class)]
    public float $vote_average;
}
