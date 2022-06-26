<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Movies\HasMovieAttributes;

class MovieCastCredit extends DataTransferObject
{
    use HasCastAttributes;
    use HasMediaAttributes;
    use HasMovieAttributes;
    public array $genre_ids;
    public int $order;
}
