<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;

class Language extends DataTransferObject
{
    public function __construct(
        #[Map(from: 'iso_639_1')]
        public string $language,
        public string $english_name,
        public string $name,
    ) {}
}
