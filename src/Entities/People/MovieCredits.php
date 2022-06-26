<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class MovieCredits extends DataTransferObject
{
    /** @var MovieCastCredit[] */
    #[CastWith(ArrayCaster::class, MovieCastCredit::class)]
    public array $cast;

    /** @var MovieCrewCredit[] */
    #[CastWith(ArrayCaster::class, MovieCrewCredit::class)]
    public array $crew;
}
