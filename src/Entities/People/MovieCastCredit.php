<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Movies\HasMovieAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class MovieCastCredit extends DataTransferObject
{
    use HasCastAttributes;
    use HasMediaAttributes;
    use HasMovieAttributes;
    public array $genre_ids;
    public int $order;
}
