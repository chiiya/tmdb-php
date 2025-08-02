<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\DataTransferObject;

class PersonTranslationData extends DataTransferObject
{
    public function __construct(
        public string $biography,
    ) {}
}
