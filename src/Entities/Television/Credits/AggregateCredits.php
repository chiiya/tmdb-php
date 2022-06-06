<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class AggregateCredits extends DataTransferObject
{
    /** @var AggregateCastCredit[] */
    #[CastWith(ArrayCaster::class, AggregateCastCredit::class)]
    public array $cast;

    /** @var AggregateCrewCredit[] */
    #[CastWith(ArrayCaster::class, AggregateCrewCredit::class)]
    public array $crew;
}
