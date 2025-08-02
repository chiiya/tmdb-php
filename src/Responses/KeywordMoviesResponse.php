<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Movies\Movie;

class KeywordMoviesResponse extends PaginatedResponse
{
    public function __construct(
        /** @var Movie[] */
        #[Cast(ArrayCaster::class, Movie::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
