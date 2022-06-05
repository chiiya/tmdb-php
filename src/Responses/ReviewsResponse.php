<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\Reviews\Review;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ReviewsResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Review> */
    #[CastWith(ArrayCaster::class, Review::class)]
    public array $results;
}
