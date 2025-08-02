<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Television\AbstractTvShow;

class TvCrewCredit extends AbstractTvShow
{
    public function __construct(
        public string $credit_id,
        public string $department,
        public string $job,
        public int $episode_count,
        public array $genre_ids,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
