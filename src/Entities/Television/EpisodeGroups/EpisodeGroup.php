<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class EpisodeGroup extends DataTransferObject
{
    public string $id;
    public string $name;
    public int $order;

    /** @var array<int, GroupedEpisode> */
    #[CastWith(ArrayCaster::class, GroupedEpisode::class)]
    public array $episodes;
}
