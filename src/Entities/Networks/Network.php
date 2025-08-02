<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Networks;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class Network extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        public string $origin_country,
        #[Cast(NullableStringCaster::class)]
        public ?string $logo_path = null,
    ) {}
}
