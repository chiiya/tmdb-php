<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class CollectionTranslationData extends DataTransferObject
{
    public string $title;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $homepage;
}
