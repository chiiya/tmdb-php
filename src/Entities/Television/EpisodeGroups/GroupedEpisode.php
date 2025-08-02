<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Chiiya\Tmdb\Entities\Television\AbstractEpisode;

class GroupedEpisode extends AbstractEpisode
{
    public function __construct(
        public int $show_id,
        public int $order,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
