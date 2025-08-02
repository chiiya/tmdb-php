<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;

class Timezone extends DataTransferObject
{
    public function __construct(
        #[Map(from: 'iso_3166_1')]
        public string $country,
        public array $zones,
    ) {}
}
