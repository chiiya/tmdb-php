<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Images;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\MediaCaster;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Stringable;

class Image extends DataTransferObject implements Stringable
{
    protected static string $format = 'image';

    public function __construct(
        public float $aspect_ratio,
        public string $file_path,
        public int $height,
        public int $width,
        public int $vote_count,
        #[Cast(NullableFloatCaster::class)]
        public float $vote_average,
        #[Cast(MediaCaster::class)]
        public null|Movie|TvShow $media,
    ) {}

    public function getType(): string
    {
        return static::$format;
    }

    public function __toString(): string
    {
        return $this->file_path;
    }
}
