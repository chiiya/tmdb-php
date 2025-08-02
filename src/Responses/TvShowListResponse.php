<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Television\TvShow;

class TvShowListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, TvShow> */
        #[Cast(ArrayCaster::class, TvShow::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
