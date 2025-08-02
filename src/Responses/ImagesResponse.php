<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;

class ImagesResponse extends DataTransferObject
{
    public function __construct(
        /** @var BackdropImage[] */
        #[Cast(ArrayCaster::class, BackdropImage::class)]
        public array $backdrops = [],
        /** @var PosterImage[] */
        #[Cast(ArrayCaster::class, PosterImage::class)]
        public array $posters = [],
        /** @var LogoImage[] */
        #[Cast(ArrayCaster::class, LogoImage::class)]
        public array $logos = [],
    ) {}
}
