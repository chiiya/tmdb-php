<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasMediaAttributes
{
    public int $id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $backdrop_path;
    public string $original_language;

    #[CastWith(NullableStringCaster::class)]
    public ?string $overview;

    #[CastWith(NullableFloatCaster::class)]
    public ?float $popularity;

    #[CastWith(NullableStringCaster::class)]
    public ?string $poster_path;

    #[CastWith(NullableFloatCaster::class)]
    public float $vote_average;
    public int $vote_count;
}
