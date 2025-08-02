<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableIntCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class ExternalIds extends DataTransferObject
{
    public function __construct(
        #[Cast(NullableStringCaster::class)]
        public ?string $imdb_id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $facebook_id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $instagram_id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $twitter_id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $freebase_mid = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $freebase_id = null,
        #[Cast(NullableIntCaster::class)]
        public ?int $tvrage_id = null,
        #[Cast(NullableIntCaster::class)]
        public ?int $tvdb_id = null,
    ) {}
}
