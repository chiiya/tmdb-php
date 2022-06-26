<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ContentRating extends DataTransferObject
{
    public string $rating;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_3166_1')]
    public string $country;
}
