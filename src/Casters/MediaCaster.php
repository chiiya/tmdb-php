<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Caster;

class MediaCaster implements Caster
{
    public function cast(mixed $value): Movie|TvShow
    {
        return match ($value['media_type']) {
            'movie' => new Movie(...$value),
            'tv' => new TvShow(...$value),
        };
    }
}
