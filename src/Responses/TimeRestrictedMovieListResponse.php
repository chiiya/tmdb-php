<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\ReleaseDatePeriod;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TimeRestrictedMovieListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Movie> */
    #[CastWith(ArrayCaster::class, Movie::class)]
    public array $results;
    public ReleaseDatePeriod $dates;
}
