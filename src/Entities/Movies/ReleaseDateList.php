<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ReleaseDateList extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;

    /** @var ReleaseDate[] */
    #[CastWith(ArrayCaster::class, ReleaseDate::class)]
    public array $release_dates;
}
