<?php

namespace Chiiya\Tmdb\Entities\Movies;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Credits extends DataTransferObject
{
    /** @var CastCredit[] */
    #[CastWith(ArrayCaster::class, CastCredit::class)]
    public array $cast;

    /** @var CrewCredit[] */
    #[CastWith(ArrayCaster::class, CrewCredit::class)]
    public array $crew;
}
