<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Country extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;
    public string $english_name;
    public string $native_name;
}
