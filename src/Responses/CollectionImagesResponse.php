<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CollectionImagesResponse extends DataTransferObject
{
    public int $id;
    /** @var BackdropImage[] */
    #[CastWith(ArrayCaster::class, BackdropImage::class)]
    public array $backdrops = [];
    /** @var PosterImage[] */
    #[CastWith(ArrayCaster::class, PosterImage::class)]
    public array $posters;
}
