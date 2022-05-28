<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasTvAttributes
{
    public string $original_name;
    public array $origin_country;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $first_air_date;
    public string $name;
}
