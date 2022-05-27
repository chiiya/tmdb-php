<?php

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Enumerators\ImageFormat;
use Spatie\DataTransferObject\Attributes\MapFrom;

class BackdropImage extends Image
{
    #[MapFrom('iso_639_1')]
    public ?string $iso6391;

    protected static string $format = ImageFormat::BACKDROP;
}
