<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;

class MovieTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public MovieTranslationData $data;
}
