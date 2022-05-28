<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\People\PopularPersonResult;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PopularPeopleResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, PopularPersonResult> */
    #[CastWith(ArrayCaster::class, PopularPersonResult::class)]
    public array $results;
}
