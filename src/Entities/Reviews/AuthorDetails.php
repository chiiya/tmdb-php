<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Reviews;

use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AuthorDetails extends DataTransferObject
{
    #[CastWith(NullableStringCaster::class)]
    public ?string $name;
    public string $username;
    #[CastWith(NullableStringCaster::class)]
    public ?string $avatar_path;
    #[CastWith(NullableFloatCaster::class)]
    public ?float $rating;
}
