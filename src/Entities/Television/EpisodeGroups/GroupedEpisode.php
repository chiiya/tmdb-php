<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Chiiya\Tmdb\Entities\Television\HasEpisodeAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class GroupedEpisode extends DataTransferObject
{
    use HasEpisodeAttributes;
    public int $show_id;
    public int $order;
}
