<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Caster;

class MediaCaster implements Caster
{
    public function __construct(
        protected array $types,
        private ?array $mappings = null,
    ) {}

    public function cast(mixed $value): Movie|TvShow
    {
        $mappings = $this->mappings ?? [
            'movie' => Movie::class,
            'tv' => TvShow::class,
        ];

        return match ($value['media_type']) {
            'movie' => new $mappings['movie'](...$value),
            'tv' => new $mappings['tv'](...$value),
        };
    }
}
