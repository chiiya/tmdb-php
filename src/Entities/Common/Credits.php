<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class Credits extends DataTransferObject
{
    public function __construct(
        /** @var CastCredit[] */
        #[Cast(ArrayCaster::class, itemType: CastCredit::class)]
        public array $cast = [],
        /** @var CrewCredit[] */
        #[Cast(ArrayCaster::class, itemType: CrewCredit::class)]
        public array $crew = [],
        /** @var CastCredit[] */
        #[Cast(ArrayCaster::class, itemType: CastCredit::class)]
        public array $guest_stars = [],
    ) {}
}
