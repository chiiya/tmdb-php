<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class RelatedCollection extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        #[Cast(NullableStringCaster::class)]
        public ?string $poster_path = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $backdrop_path = null,
    ) {}
}
