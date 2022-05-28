<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Casters\CreditsArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class CombinedCredits extends DataTransferObject
{
    /** @var array<int, MovieCastCredit|TvCastCredit> */
    #[CastWith(CreditsArrayCaster::class, 'cast')]
    public array $cast;

    /** @var array<int, MovieCrewCredit|TvCrewCredit> */
    #[CastWith(CreditsArrayCaster::class, 'crew')]
    public array $crew;
}
