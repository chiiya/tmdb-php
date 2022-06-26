<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;

class CollectionTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public CollectionTranslationData $data;
}
