<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Timezone extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;
    public array $zones;
}
