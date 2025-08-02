<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\ImagesArrayCaster;
use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\Images\StillImage;

class TaggedImagesResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, PosterImage|BackdropImage|LogoImage|ProfileImage|StillImage> */
        #[Cast(ImagesArrayCaster::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
