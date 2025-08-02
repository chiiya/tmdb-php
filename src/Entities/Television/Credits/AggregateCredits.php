<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class AggregateCredits extends DataTransferObject
{
    public function __construct(
        /** @var AggregateCastCredit[] */
        #[Cast(ArrayCaster::class, AggregateCastCredit::class)]
        public array $cast = [],
        /** @var AggregateCrewCredit[] */
        #[Cast(ArrayCaster::class, AggregateCrewCredit::class)]
        public array $crew = [],
    ) {}
}
