<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\Television\TvShow;
use LogicException;

class MediaArrayCaster extends AbstractArrayCaster
{
    protected function castItem(mixed $data): Movie|Person|TvShow
    {
        if (is_array($data)) {
            return match ($data['media_type']) {
                'movie' => Movie::decode($data),
                'tv' => TvShow::decode($data),
                'person' => Person::decode($data),
            };
        }

        throw new LogicException(
            'Caster [MediaArrayCaster] each item must be an array or an instance of Movie, TvShow or Person.',
        );
    }
}
