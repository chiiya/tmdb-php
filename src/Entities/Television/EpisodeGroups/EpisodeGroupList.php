<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Chiiya\Tmdb\Entities\Networks\Network;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class EpisodeGroupList extends DataTransferObject
{
    public string $description;
    public int $episode_count;
    public int $group_count;
    public string $id;
    public string $name;
    public ?Network $network;
    public int $type;

    /** @var array<int, EpisodeGroup>|null */
    #[CastWith(ArrayCaster::class, EpisodeGroup::class)]
    public ?array $groups;
}
