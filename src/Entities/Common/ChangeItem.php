<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class ChangeItem extends DataTransferObject
{
    public function __construct(
        public string $id,
        public string $action,
        public string $time,
        public mixed $value,
        public mixed $original_value,
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_639_1')]
        public ?string $language = null,
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_3166_1')]
        public ?string $country = null,
    ) {}
}
