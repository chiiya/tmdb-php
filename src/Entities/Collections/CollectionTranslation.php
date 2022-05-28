<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class CollectionTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public CollectionTranslationData $data;
}
