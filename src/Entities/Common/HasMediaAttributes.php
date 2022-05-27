<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

trait HasMediaAttributes
{
    public int $id;
    public ?string $backdrop_path;
    public string $original_language;
    public ?string $overview;
    public int|float $popularity;
    public ?string $poster_path;
    public int|float $vote_average;
    public int $vote_count;
}
