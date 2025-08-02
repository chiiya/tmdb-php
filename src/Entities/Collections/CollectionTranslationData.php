<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class CollectionTranslationData extends DataTransferObject
{
    public function __construct(
        public string $title,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
    ) {}
}
