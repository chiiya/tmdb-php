<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class ContentRating extends DataTransferObject
{
    public function __construct(
        public string $rating,
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_3166_1')]
        public string $country,
    ) {}
}
