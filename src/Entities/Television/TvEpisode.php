<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\CastCredit;
use Chiiya\Tmdb\Entities\Common\CrewCredit;

class TvEpisode extends AbstractEpisode
{
    public function __construct(
        public ?int $runtime = null,
        /** @var array<int, CrewCredit> */
        #[Cast(ArrayCaster::class, CrewCredit::class)]
        public array $crew = [],
        /** @var array<int, CastCredit> */
        #[Cast(ArrayCaster::class, CastCredit::class)]
        public array $guest_stars = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
