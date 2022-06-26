<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\EpisodeGroups;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Television\HasEpisodeAttributes;

class GroupedEpisode extends DataTransferObject
{
    use HasEpisodeAttributes;
    public int $show_id;
    public int $order;
}
