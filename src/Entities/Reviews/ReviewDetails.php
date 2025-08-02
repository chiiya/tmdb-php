<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Reviews;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class ReviewDetails extends Review
{
    public function __construct(
        public int $media_id,
        public string $media_title,
        public string $media_type,
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_639_1')]
        public ?string $language = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
