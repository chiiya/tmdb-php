<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Enumerators\ImageFormat;

class LogoImage extends Image
{
    protected static string $format = ImageFormat::LOGO;
    public string $id;
    public string $file_type;
}
