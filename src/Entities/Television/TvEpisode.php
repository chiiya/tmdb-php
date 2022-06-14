<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\CastCredit;
use Chiiya\Tmdb\Entities\Common\CrewCredit;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TvEpisode extends DataTransferObject
{
    use HasEpisodeAttributes;
    public ?int $runtime;

    /** @var array<int, CrewCredit> */
    #[CastWith(ArrayCaster::class, CrewCredit::class)]
    public ?array $crew;

    /** @var array<int, CastCredit> */
    #[CastWith(ArrayCaster::class, CastCredit::class)]
    public ?array $guest_stars;
}
