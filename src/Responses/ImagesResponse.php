<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ImagesResponse extends DataTransferObject
{
    /** @var BackdropImage[] */
    #[CastWith(ArrayCaster::class, BackdropImage::class)]
    public array $backdrops = [];

    /** @var PosterImage[] */
    #[CastWith(ArrayCaster::class, PosterImage::class)]
    public array $posters = [];

    /** @var LogoImage[] */
    #[CastWith(ArrayCaster::class, LogoImage::class)]
    public array $logos = [];
}
