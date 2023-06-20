<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Responses\CombinedSearchResponse;
use Chiiya\Tmdb\Responses\FindByIDResponse;
use Chiiya\Tmdb\Responses\MovieListResponse;
use Chiiya\Tmdb\Responses\TvShowListResponse;

class BrowseRepository extends BaseRepository
{
    /**
     * The find method makes it easy to search for objects in our database by an external id.
     *
     * This method will search all objects (movies, TV shows and people) and return the results
     * in a single response.
     *
     * @see https://developers.themoviedb.org/3/find/find-by-id
     *
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function findByID(string $id, string $source, array $parameters = []): FindByIDResponse
    {
        $response = $this->client->get("find/{$id}", array_merge([
            'external_source' => $source,
        ], $parameters));

        return new FindByIDResponse($response);
    }

    /**
     * Discover movies by different types of data like average rating, number of votes,
     * genres and certifications.
     *
     * This endpoint supports a wide array of different query parameters, check out the
     * TMDB documentation for more details:
     *
     * @see https://developers.themoviedb.org/3/discover/movie-discover
     *
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function discoverMovies(array $parameters = []): MovieListResponse
    {
        $response = $this->client->get('discover/movie', $parameters);

        return new MovieListResponse($response);
    }

    /**
     * Discover TV shows by different types of data like average rating, number of votes,
     * genres, the network they aired on and air dates.
     *
     * This endpoint supports a wide array of different query parameters, check out the
     * TMDB documentation for more details:
     *
     * @see https://developers.themoviedb.org/3/discover/tv-discover
     *
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function discoverTV(array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('discover/tv', $parameters);

        return new TvShowListResponse($response);
    }

    /**
     * Get the daily or weekly trending items. The daily trending list tracks items over the
     * period of a day while items have a 24 hour half life. The weekly list tracks items over
     * a 7 day period, with a 7 day half life.
     *
     * Valid types: all, movie, tv, person
     * Valid time windows: day, week
     *
     * @see https://developers.themoviedb.org/3/trending/get-trending
     *
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getTrending(string $type, string $timeWindow, array $parameters = []): CombinedSearchResponse
    {
        $response = $this->client->get("trending/{$type}/{$timeWindow}", $parameters);

        return new CombinedSearchResponse($response);
    }
}
