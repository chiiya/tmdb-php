<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;

abstract class AbstractTranslation extends DataTransferObject
{
    public function __construct(
        #[Map(from: 'iso_3166_1')]
        public string $country,
        #[Map(from: 'iso_639_1')]
        public string $language,
        public string $name,
        public string $english_name,
    ) {}
}
