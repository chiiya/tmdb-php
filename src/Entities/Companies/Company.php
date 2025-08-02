<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Companies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class Company extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        #[Cast(NullableStringCaster::class)]
        public ?string $origin_country = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $logo_path = null,
    ) {}
}
