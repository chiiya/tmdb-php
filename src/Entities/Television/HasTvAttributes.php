<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

trait HasTvAttributes
{
    public string $original_name;
    public array $origin_country;
    public string $name;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $first_air_date;

    #[MapFrom('first_air_date')]
    #[CastWith(ReleaseYearCaster::class)]
    public ?int $release_year;
}
