<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\CreditsArrayCaster;

class CombinedCredits extends DataTransferObject
{
    public function __construct(
        /** @var array<int, MovieCastCredit|TvCastCredit> */
        #[Cast(CreditsArrayCaster::class, 'cast')]
        public array $cast = [],
        /** @var array<int, MovieCrewCredit|TvCrewCredit> */
        #[Cast(CreditsArrayCaster::class, 'crew')]
        public array $crew = [],
    ) {}
}
