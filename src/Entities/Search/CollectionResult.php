<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Search;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class CollectionResult extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        public string $overview,
        #[Cast(NullableStringCaster::class)]
        public ?string $poster_path,
        #[Cast(NullableStringCaster::class)]
        public ?string $backdrop_path,
        public bool $adult,
        public string $original_language,
        public string $original_name,
    ) {}
}
