<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

trait HasMovieAttributes
{
    public bool $adult;
    public string $original_title;
    public string $release_date;
    public string $title;
    public bool $video;
}
