<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ExternalIds extends DataTransferObject
{
    #[CastWith(NullableStringCaster::class)]
    public ?string $imdb_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $facebook_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $instagram_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $twitter_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $freebase_mid;

    #[CastWith(NullableStringCaster::class)]
    public ?string $freebase_id;

    #[CastWith(NullableStringCaster::class)]
    public ?int $tvrage_id;

    #[CastWith(NullableStringCaster::class)]
    public ?int $tvdb_id;
}
