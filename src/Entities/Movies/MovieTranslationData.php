<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class MovieTranslationData extends DataTransferObject
{
    public function __construct(
        public string $title,
        public ?int $runtime = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $tagline = null,
    ) {}
}
