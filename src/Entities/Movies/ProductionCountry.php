<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ProductionCountry extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;
    public string $name;
}
