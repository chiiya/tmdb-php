<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\AbstractTranslation;

class TelevisionTranslation extends AbstractTranslation
{
    public function __construct(
        public TelevisionTranslationData $data,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
