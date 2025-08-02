<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Credits;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Television\TvEpisode;
use Chiiya\Tmdb\Entities\Television\TvSeason;
use Chiiya\Tmdb\Entities\Television\TvShow;

class TvCredit extends TvShow
{
    public function __construct(
        /** @var array<int, TvSeason> */
        #[Cast(ArrayCaster::class, TvSeason::class)]
        public array $seasons = [],
        /** @var array<int, TvEpisode> */
        #[Cast(ArrayCaster::class, TvEpisode::class)]
        public array $episodes = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
