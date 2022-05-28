<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Enumerators\ImageFormat;
use Spatie\DataTransferObject\Attributes\MapFrom;

class StillImage extends Image
{
    protected static string $format = ImageFormat::STILL;

    #[MapFrom('iso_639_1')]
    public ?string $iso6391;
}
