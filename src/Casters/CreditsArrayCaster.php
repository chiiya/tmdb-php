<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\People\MovieCastCredit;
use Chiiya\Tmdb\Entities\People\MovieCrewCredit;
use Chiiya\Tmdb\Entities\People\TvCastCredit;
use Chiiya\Tmdb\Entities\People\TvCrewCredit;
use LogicException;

class CreditsArrayCaster extends AbstractArrayCaster
{
    public function __construct(
        private readonly array $types,
        private readonly string $type,
    ) {
        parent::__construct($this->types);
    }

    protected function castItem(mixed $data): MovieCastCredit|MovieCrewCredit|TvCastCredit|TvCrewCredit
    {
        if (is_array($data)) {
            return match ($data['media_type']) {
                'movie' => $this->type === 'cast' ? MovieCastCredit::decode($data) : MovieCrewCredit::decode($data),
                'tv' => $this->type === 'cast' ? TvCastCredit::decode($data) : TvCrewCredit::decode($data),
            };
        }

        throw new LogicException(
            'Caster [CreditsArrayCaster] each item must be an array or an instance of Movie or TvShow.',
        );
    }
}
