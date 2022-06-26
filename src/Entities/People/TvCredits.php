<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TvCredits extends DataTransferObject
{
    /** @var TvCastCredit[] */
    #[CastWith(ArrayCaster::class, TvCastCredit::class)]
    public array $cast;

    /** @var TvCrewCredit[] */
    #[CastWith(ArrayCaster::class, TvCrewCredit::class)]
    public array $crew;
}
