<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class AlternativeTitle extends DataTransferObject
{
    public function __construct(
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_3166_1')]
        public ?string $country = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $title = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $type = null,
    ) {}
}
