<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

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
