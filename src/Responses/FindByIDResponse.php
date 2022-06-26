<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\Television\TvEpisode;
use Chiiya\Tmdb\Entities\Television\TvSeason;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class FindByIDResponse extends DataTransferObject
{
    /** @var array<int, Movie> */
    #[CastWith(ArrayCaster::class, Movie::class)]
    public array $movie_results;

    /** @var array<int, Person> */
    #[CastWith(ArrayCaster::class, Person::class)]
    public array $person_results;

    /** @var array<int, TvShow> */
    #[CastWith(ArrayCaster::class, TvShow::class)]
    public array $tv_results;

    /** @var array<int, TvEpisode> */
    #[CastWith(ArrayCaster::class, TvEpisode::class)]
    public array $tv_episode_results;

    /** @var array<int, TvSeason> */
    #[CastWith(ArrayCaster::class, TvSeason::class)]
    public array $tv_season_results;
}
