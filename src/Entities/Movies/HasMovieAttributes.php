<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasMovieAttributes
{
    public bool $adult;
    public string $original_title;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $release_date;
    public string $title;
    public bool $video;
}
