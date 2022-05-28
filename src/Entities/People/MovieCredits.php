<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class MovieCredits extends DataTransferObject
{
    /** @var MovieCastCredit[] */
    #[CastWith(ArrayCaster::class, MovieCastCredit::class)]
    public array $cast;

    /** @var MovieCrewCredit[] */
    #[CastWith(ArrayCaster::class, MovieCrewCredit::class)]
    public array $crew;
}
