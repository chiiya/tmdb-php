<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Entities\Common\AbstractTranslation;

class MovieTranslation extends AbstractTranslation
{
    public function __construct(
        public MovieTranslationData $data,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
