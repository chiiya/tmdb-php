<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;

class Timezone extends DataTransferObject
{
    #[MapFrom('iso_3166_1')]
    public string $country;
    public array $zones;
}
