<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class ReleaseDateList extends DataTransferObject
{
    public function __construct(
        #[Map(from: 'iso_3166_1')]
        public string $country,
        /** @var ReleaseDate[] */
        #[Cast(ArrayCaster::class, ReleaseDate::class)]
        public array $release_dates = [],
    ) {}
}
