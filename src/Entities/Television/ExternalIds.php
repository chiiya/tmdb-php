<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ExternalIds extends DataTransferObject
{
    #[CastWith(NullableStringCaster::class)]
    public ?string $imdb_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $freebase_mid;

    #[CastWith(NullableStringCaster::class)]
    public ?string $freebase_id;

    #[CastWith(NullableStringCaster::class)]
    public ?int $tvrage_id;

    #[CastWith(NullableStringCaster::class)]
    public ?int $tvdb_id;
}
