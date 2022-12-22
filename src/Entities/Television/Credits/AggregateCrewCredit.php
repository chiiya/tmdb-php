<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\People\HasPersonAttributes;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class AggregateCrewCredit extends DataTransferObject
{
    use HasPersonAttributes;
    public int $id;

    /** @var array<int, CrewJob> */
    #[CastWith(ArrayCaster::class, CrewJob::class)]
    public array $jobs;
    public int $total_episode_count;
    public ?string $original_name;
    public string $department;
}
