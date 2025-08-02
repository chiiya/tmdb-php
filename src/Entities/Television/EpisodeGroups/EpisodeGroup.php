<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class EpisodeGroup extends DataTransferObject
{
    public function __construct(
        public string $id,
        public string $name,
        public int $order,
        /** @var array<int, GroupedEpisode> */
        #[Cast(ArrayCaster::class, GroupedEpisode::class)]
        public array $episodes = [],
    ) {}
}
