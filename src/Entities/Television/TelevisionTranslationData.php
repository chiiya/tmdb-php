<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class TelevisionTranslationData extends DataTransferObject
{
    public string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $homepage;

    #[CastWith(NullableStringCaster::class)]
    public ?string $tagline;
}
