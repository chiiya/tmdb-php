<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;

class Movie extends DataTransferObject
{
    use HasMediaAttributes;
    use HasMovieAttributes;
    public array $genre_ids;
}
