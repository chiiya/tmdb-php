<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Common\AbstractTranslation;

class PersonTranslation extends AbstractTranslation
{
    public function __construct(
        public PersonTranslationData $data,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
