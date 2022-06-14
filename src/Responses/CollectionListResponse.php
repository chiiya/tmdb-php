<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\Search\CollectionResult;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CollectionListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, CollectionResult> */
    #[CastWith(ArrayCaster::class, CollectionResult::class)]
    public array $results;
}
