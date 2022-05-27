<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Genre;

class GenreRepository extends BaseRepository
{
    /**
     * Get the list of official genres for movies.
     *
     * @see https://developers.themoviedb.org/3/genres/get-movie-list
     *
     * @return Genre[]
     */
    public function getMovieGenres(array $parameters = []): array
    {
        $response = $this->client->get('genre/movie/list', $parameters)['genres'];

        return Genre::arrayOf($response);
    }

    /**
     * Get the list of official genres for TV shows.
     *
     * @see https://developers.themoviedb.org/3/genres/get-tv-list
     *
     * @return Genre[]
     */
    public function getTvGenres(array $parameters = []): array
    {
        $response = $this->client->get('genre/tv/list', $parameters)['genres'];

        return Genre::arrayOf($response);
    }
}
