<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Movies\AbstractMovie;

class MovieCastCredit extends AbstractMovie
{
    public function __construct(
        public string $credit_id,
        public string $character,
        public array $genre_ids,
        public int $order,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
