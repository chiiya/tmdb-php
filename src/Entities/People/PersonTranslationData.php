<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Spatie\DataTransferObject\DataTransferObject;

class PersonTranslationData extends DataTransferObject
{
    public string $biography;
}
