<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\HasTranslationAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class TelevisionTranslation extends DataTransferObject
{
    use HasTranslationAttributes;
    public TelevisionTranslationData $data;
}
