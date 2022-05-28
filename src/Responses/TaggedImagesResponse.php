<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Casters\ImagesArrayCaster;
use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\Images\StillImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class TaggedImagesResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, PosterImage|BackdropImage|LogoImage|ProfileImage|StillImage> */
    #[CastWith(ImagesArrayCaster::class)]
    public array $results;
}
