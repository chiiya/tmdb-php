<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ContentRating extends DataTransferObject
{
    public string $rating;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_3166_1')]
    public string $country;
}
