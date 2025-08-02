<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Reviews\Review;

class ReviewsResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Review> */
        #[Cast(ArrayCaster::class, Review::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
