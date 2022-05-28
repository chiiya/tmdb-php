<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TvCredits extends DataTransferObject
{
    /** @var TvCastCredit[] */
    #[CastWith(ArrayCaster::class, TvCastCredit::class)]
    public array $cast;

    /** @var TvCrewCredit[] */
    #[CastWith(ArrayCaster::class, TvCrewCredit::class)]
    public array $crew;
}
