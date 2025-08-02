<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

class Movie extends AbstractMovie
{
    public function __construct(
        public array $genre_ids,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
