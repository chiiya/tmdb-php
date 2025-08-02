<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class MovieCredits extends DataTransferObject
{
    public function __construct(
        /** @var MovieCastCredit[] */
        #[Cast(ArrayCaster::class, MovieCastCredit::class)]
        public array $cast = [],
        /** @var MovieCrewCredit[] */
        #[Cast(ArrayCaster::class, MovieCrewCredit::class)]
        public array $crew = [],
    ) {}
}
