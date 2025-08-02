<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\MediaArrayCaster;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\Television\TvShow;

class CombinedSearchResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Movie|TvShow|Person> */
        #[Cast(MediaArrayCaster::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
