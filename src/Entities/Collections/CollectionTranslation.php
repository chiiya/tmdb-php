<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Entities\Common\AbstractTranslation;

class CollectionTranslation extends AbstractTranslation
{
    public function __construct(
        public CollectionTranslationData $data,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
