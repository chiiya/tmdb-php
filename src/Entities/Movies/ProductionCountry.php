<?php

namespace Chiiya\Tmdb\Entities\Movies;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ProductionCountry extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;
    public string $name;
}