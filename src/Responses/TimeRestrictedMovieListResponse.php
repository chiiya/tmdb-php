<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\ReleaseDatePeriod;
use Chiiya\Tmdb\Entities\Movies\Movie;

class TimeRestrictedMovieListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Movie> */
        #[Cast(ArrayCaster::class, Movie::class)]
        public array $results,
        public ReleaseDatePeriod $dates,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
