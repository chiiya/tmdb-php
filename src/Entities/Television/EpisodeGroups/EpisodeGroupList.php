<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Entities\Networks\Network;

class EpisodeGroupList extends DataTransferObject
{
    public function __construct(
        public string $description,
        public int $episode_count,
        public int $group_count,
        public string $id,
        public string $name,
        public int $type,
        public ?Network $network = null,
        /** @var array<int, EpisodeGroup>|null */
        #[Cast(ArrayCaster::class, EpisodeGroup::class)]
        public array $groups = [],
    ) {}
}
