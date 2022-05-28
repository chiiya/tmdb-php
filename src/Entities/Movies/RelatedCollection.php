<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class RelatedCollection extends DataTransferObject
{
    public int $id;
    public string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $poster_path;

    #[CastWith(NullableStringCaster::class)]
    public ?string $backdrop_path;
}
