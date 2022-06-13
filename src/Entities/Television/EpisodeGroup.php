<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Networks\Network;
use Spatie\DataTransferObject\DataTransferObject;

class EpisodeGroup extends DataTransferObject
{
    public string $description;
    public int $episode_count;
    public int $group_count;
    public string $id;
    public string $name;
    public ?Network $network;
    public int $type;
}
