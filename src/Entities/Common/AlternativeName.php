<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class AlternativeName extends DataTransferObject
{
    public function __construct(
        public string $name,
        #[Cast(NullableStringCaster::class)]
        public ?string $type = null,
    ) {}
}
