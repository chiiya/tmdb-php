<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class TelevisionTranslationData extends DataTransferObject
{
    public function __construct(
        public string $name,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $tagline = null,
    ) {}
}
