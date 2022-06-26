<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;

class PersonTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public PersonTranslationData $data;
}
