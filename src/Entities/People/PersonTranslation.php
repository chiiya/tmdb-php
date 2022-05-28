<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class PersonTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public PersonTranslationData $data;
}
