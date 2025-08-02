<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\AbstractPerson;

class AggregateCrewCredit extends AbstractPerson
{
    public function __construct(
        public int $id,
        public string $department,
        public int $total_episode_count,
        /** @var array<int, CrewJob> */
        #[Cast(ArrayCaster::class, CrewJob::class)]
        public array $jobs = [],
        public ?string $original_name = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
