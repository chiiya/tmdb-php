<?php

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Enumerators\ImageFormat;

class LogoImage extends Image
{
    public string $id;
    public string $file_type;

    protected static string $format = ImageFormat::LOGO;
}
