<?php

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class Movie extends DataTransferObject
{
    use HasMediaAttributes;
    use HasMovieAttributes;

    public array $genre_ids;
}
