<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class TvCredits extends DataTransferObject
{
    public function __construct(
        /** @var TvCastCredit[] */
        #[Cast(ArrayCaster::class, TvCastCredit::class)]
        public array $cast = [],
        /** @var TvCrewCredit[] */
        #[Cast(ArrayCaster::class, TvCrewCredit::class)]
        public array $crew = [],
    ) {}
}
