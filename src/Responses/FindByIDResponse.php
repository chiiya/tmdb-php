<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\Television\TvEpisode;
use Chiiya\Tmdb\Entities\Television\TvSeason;
use Chiiya\Tmdb\Entities\Television\TvShow;

class FindByIDResponse extends DataTransferObject
{
    public function __construct(
        /** @var array<int, Movie> */
        #[Cast(ArrayCaster::class, Movie::class)]
        public array $movie_results = [],
        /** @var array<int, Person> */
        #[Cast(ArrayCaster::class, Person::class)]
        public array $person_results = [],
        /** @var array<int, TvShow> */
        #[Cast(ArrayCaster::class, TvShow::class)]
        public array $tv_results = [],
        /** @var array<int, TvEpisode> */
        #[Cast(ArrayCaster::class, TvEpisode::class)]
        public array $tv_episode_results = [],
        /** @var array<int, TvSeason> */
        #[Cast(ArrayCaster::class, TvSeason::class)]
        public array $tv_season_results = [],
    ) {}
}
