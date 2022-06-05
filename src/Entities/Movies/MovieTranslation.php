<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class MovieTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public MovieTranslationData $data;
}
