<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Enumerators\ImageFormat;

class LogoImage extends Image
{
    protected static string $format = ImageFormat::LOGO;

    public function __construct(
        public ?string $id = null,
        public ?string $file_type = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
