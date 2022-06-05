<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

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
}
