<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Enumerators\ImageFormat;

class BackdropImage extends Image
{
    protected static string $format = ImageFormat::BACKDROP;

    public function __construct(
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_639_1')]
        public ?string $language = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
