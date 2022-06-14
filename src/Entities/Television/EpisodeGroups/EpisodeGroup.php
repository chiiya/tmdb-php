<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class EpisodeGroup extends DataTransferObject
{
    public string $id;
    public string $name;
    public int $order;

    /** @var array<int, GroupedEpisode> */
    #[CastWith(ArrayCaster::class, GroupedEpisode::class)]
    public array $episodes;
}
