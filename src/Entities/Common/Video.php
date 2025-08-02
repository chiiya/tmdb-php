<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use DateTimeImmutable;

class Video extends DataTransferObject
{
    public function __construct(
        public string $id,
        #[Map(from: 'iso_639_1')]
        public string $language,
        #[Map(from: 'iso_3166_1')]
        public string $country,
        public string $name,
        public string $key,
        public string $site,
        public int $size,
        public string $type,
        public bool $official,
        #[Cast(DateTimeCaster::class)]
        public DateTimeImmutable $published_at,
    ) {}
}
