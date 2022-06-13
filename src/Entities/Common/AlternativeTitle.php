<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class AlternativeTitle extends DataTransferObject
{
    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_3166_1')]
    public string $country;

    #[CastWith(NullableStringCaster::class)]
    public string $title;

    #[CastWith(NullableStringCaster::class)]
    public ?string $type;
}
