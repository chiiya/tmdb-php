<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\MediaArrayCaster;
use Chiiya\Tmdb\Entities\Common\AbstractPerson;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;

class Person extends AbstractPerson
{
    public function __construct(
        public int $id,
        /** @var array<int, Movie|TvShow> */
        #[Cast(MediaArrayCaster::class)]
        public array $known_for = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
