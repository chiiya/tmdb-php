<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Search\CollectionResult;

class CollectionListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var CollectionResult[] $results */
        #[Cast(ArrayCaster::class, CollectionResult::class)]
        public array $results = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
