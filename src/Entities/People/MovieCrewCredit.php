<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Movies\AbstractMovie;

class MovieCrewCredit extends AbstractMovie
{
    public function __construct(
        public string $credit_id,
        public string $department,
        public string $job,
        public array $genre_ids,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
