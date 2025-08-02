<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Responses\ChangesResponse;

class ChangeRepository extends BaseRepository
{
    /**
     * Get a list of all movie ids that have been changed in the past 24 hours.
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-movie-change-list
     */
    public function getMovieChanges(array $parameters = []): ChangesResponse
    {
        $response = $this->client->get('movie/changes', $parameters);

        return ChangesResponse::decode($response);
    }

    /**
     * Get a list of all TV show ids that have been changed in the past 24 hours.
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     */
    public function getTvChanges(array $parameters = []): ChangesResponse
    {
        $response = $this->client->get('tv/changes', $parameters);

        return ChangesResponse::decode($response);
    }

    /**
     * Get a list of all person ids that have been changed in the past 24 hours.
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     */
    public function getPersonChanges(array $parameters = []): ChangesResponse
    {
        $response = $this->client->get('person/changes', $parameters);

        return ChangesResponse::decode($response);
    }
}
