<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Casters\MediaArrayCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;

class Person extends DataTransferObject
{
    use HasPersonAttributes;
    public int $id;

    /** @var array<int, Movie|TvShow> */
    #[CastWith(MediaArrayCaster::class)]
    public array $known_for;
}
