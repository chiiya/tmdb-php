<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Responses\KeywordMoviesResponse;

class KeywordRepository extends BaseRepository
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     */
    public function getKeyword(int|string $id, array $parameters = []): Keyword
    {
        $response = $this->client->get("keyword/{$id}", $parameters);

        return Keyword::decode($response);
    }

    /**
     * Get the movies that belong to a keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-movies-by-keyword
     */
    public function getMovies(int|string $id, array $parameters = []): KeywordMoviesResponse
    {
        $response = $this->client->get("keyword/{$id}/movies", $parameters);

        return KeywordMoviesResponse::decode($response);
    }
}
