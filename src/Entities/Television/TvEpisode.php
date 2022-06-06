<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Common\CastCredit;
use Chiiya\Tmdb\Entities\Common\CrewCredit;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TvEpisode extends DataTransferObject
{
    public int $id;

    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $air_date;
    public int $episode_number;

    #[CastWith(NullableStringCaster::class)]
    public ?string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $production_code;
    public ?int $runtime;
    public int $season_number;

    #[CastWith(NullableStringCaster::class)]
    public ?string $still_path;
    public int $vote_count;

    #[CastWith(NullableFloatCaster::class)]
    public float $vote_average;

    /** @var array<int, CrewCredit> */
    #[CastWith(ArrayCaster::class, CrewCredit::class)]
    public array $crew;

    /** @var array<int, CastCredit> */
    #[CastWith(ArrayCaster::class, CastCredit::class)]
    public array $guest_stars;
}
