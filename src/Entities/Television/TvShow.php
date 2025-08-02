<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

class TvShow extends AbstractTvShow
{
    public function __construct(
        public array $genre_ids,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
