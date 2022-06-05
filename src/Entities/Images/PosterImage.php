<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Enumerators\ImageFormat;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class PosterImage extends Image
{
    protected static string $format = ImageFormat::POSTER;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_639_1')]
    public ?string $language;
}
