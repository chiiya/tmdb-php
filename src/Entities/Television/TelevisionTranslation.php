<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;

class TelevisionTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public TelevisionTranslationData $data;
}
