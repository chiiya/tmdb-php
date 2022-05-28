<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Movies\HasMovieAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class MovieCrewCredit extends DataTransferObject
{
    use HasCrewAttributes;
    use HasMediaAttributes;
    use HasMovieAttributes;
    public array $genre_ids;
}
