<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Casters\MediaArrayCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;

class CombinedSearchResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Movie|TvShow|Person> */
    #[CastWith(MediaArrayCaster::class)]
    public array $results;
}
