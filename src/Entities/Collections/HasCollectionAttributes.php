<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasCollectionAttributes
{
    public int $id;
    public string $name;
    public string $overview;

    #[CastWith(NullableStringCaster::class)]
    public ?string $poster_path;

    #[CastWith(NullableStringCaster::class)]
    public ?string $backdrop_path;
}
