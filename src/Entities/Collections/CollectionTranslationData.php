<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class CollectionTranslationData extends DataTransferObject
{
    public string $title;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $homepage;
}
