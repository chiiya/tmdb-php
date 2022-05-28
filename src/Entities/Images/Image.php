<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Chiiya\Tmdb\Casters\MediaCaster;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use Stringable;

class Image extends DataTransferObject implements Stringable
{
    protected static string $format = 'image';
    public float $aspect_ratio;
    public string $file_path;
    public int $height;
    public int $width;
    public int $vote_count;

    #[CastWith(NullableFloatCaster::class)]
    public float $vote_average;

    #[CastWith(MediaCaster::class)]
    public Movie|TvShow|null $media;

    public function getType(): string
    {
        return static::$format;
    }

    public function __toString(): string
    {
        return $this->file_path;
    }
}
