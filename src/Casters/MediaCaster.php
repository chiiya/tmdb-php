<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use Chiiya\Tmdb\Entities\Credits\TvCredit;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;

class MediaCaster implements CastsProperty
{
    public function __construct(
        protected array $types,
        private readonly ?array $mappings = null,
    ) {}

    public function unserialize(mixed $value): null|Movie|TvCredit|TvShow
    {
        if ($value === null) {
            return null;
        }

        $mappings = $this->mappings ?? [
            'movie' => Movie::class,
            'tv' => TvShow::class,
        ];

        return match ($value['media_type']) {
            'movie' => $mappings['movie']::decode($value),
            'tv' => $mappings['tv']::decode($value),
        };
    }

    public function serialize(mixed $value): ?array
    {
        return $value?->encode();
    }
}
