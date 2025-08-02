<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Reviews;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class AuthorDetails extends DataTransferObject
{
    public function __construct(
        public string $username,
        #[Cast(NullableStringCaster::class)]
        public ?string $name = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $avatar_path = null,
        #[Cast(NullableFloatCaster::class)]
        public ?float $rating = null,
    ) {}
}
