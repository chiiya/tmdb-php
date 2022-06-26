<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TvShowListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, TvShow> */
    #[CastWith(ArrayCaster::class, TvShow::class)]
    public array $results;
}
