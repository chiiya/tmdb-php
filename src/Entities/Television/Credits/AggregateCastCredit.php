<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\People\HasPersonAttributes;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class AggregateCastCredit extends DataTransferObject
{
    use HasPersonAttributes;

    /** @var array<int, CastRole> */
    #[CastWith(ArrayCaster::class, CastRole::class)]
    public array $roles;
    public int $total_episode_count;
    public ?string $original_name;
    public int $order;
}
