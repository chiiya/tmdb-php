<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Keyword;
use Chiiya\Tmdb\Responses\KeywordMoviesResponse;

class KeywordRepository extends BaseRepository
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     */
    public function getKeyword(string|int $id, array $parameters = []): Keyword
    {
        $response = $this->client->get("keyword/{$id}", $parameters);

        return new Keyword($response);
    }

    /**
     * Get the movies that belong to a keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-movies-by-keyword
     */
    public function getMovies(string|int $id, array $parameters = []): KeywordMoviesResponse
    {
        $response = $this->client->get("keyword/{$id}/movies", $parameters);

        return new KeywordMoviesResponse($response);
    }
}
