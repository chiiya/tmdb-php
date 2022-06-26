<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Search\CollectionResult;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CollectionListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, CollectionResult> */
    #[CastWith(ArrayCaster::class, CollectionResult::class)]
    public array $results;
}
