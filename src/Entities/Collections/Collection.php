<?php

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Collection extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $overview;
    public ?string $poster_path;
    public ?string $backdrop_path;

    /** @var Movie[] */
    #[CastWith(ArrayCaster::class, Movie::class)]
    public array $parts = [];

    /** @var PosterImage[]|null */
    #[CastWith(ArrayCaster::class, PosterImage::class)]
    #[MapFrom('images.posters')]
    public ?array $posters;

    /** @var BackdropImage[]|null */
    #[CastWith(ArrayCaster::class, BackdropImage::class)]
    #[MapFrom('images.backdrops')]
    public ?array $backdrops;

    /** @var Translation[]|null */
    #[CastWith(ArrayCaster::class, Translation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;
}
