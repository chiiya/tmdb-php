<?php

namespace Chiiya\Tmdb\Entities\Images;

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
    public int|float $vote_average;

    public function getType(): string
    {
        return static::$format;
    }

    public function __toString(): string
    {
        return $this->file_path;
    }
}
