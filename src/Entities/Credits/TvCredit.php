<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Credits;

use Chiiya\Tmdb\Entities\Television\TvEpisode;
use Chiiya\Tmdb\Entities\Television\TvSeason;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TvCredit extends TvShow
{
    /** @var array<int, TvSeason> */
    #[CastWith(ArrayCaster::class, TvSeason::class)]
    public array $seasons;

    /** @var array<int, TvEpisode> */
    #[CastWith(ArrayCaster::class, TvEpisode::class)]
    public array $episodes;
}
