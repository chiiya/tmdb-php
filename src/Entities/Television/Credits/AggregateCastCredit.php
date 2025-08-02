<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\AbstractPerson;

class AggregateCastCredit extends AbstractPerson
{
    public function __construct(
        public int $id,
        public int $total_episode_count,
        public int $order,
        /** @var array<int, CastRole> */
        #[Cast(ArrayCaster::class, CastRole::class)]
        public array $roles = [],
        public ?string $original_name = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
