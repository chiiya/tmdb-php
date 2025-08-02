<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Responses\CollectionListResponse;
use Chiiya\Tmdb\Responses\CombinedSearchResponse;
use Chiiya\Tmdb\Responses\CompanyListResponse;
use Chiiya\Tmdb\Responses\KeywordListResponse;
use Chiiya\Tmdb\Responses\MovieListResponse;
use Chiiya\Tmdb\Responses\PersonListResponse;
use Chiiya\Tmdb\Responses\TvShowListResponse;

class SearchRepository extends BaseRepository
{
    /**
     * Search for companies.
     *
     * @see https://developers.themoviedb.org/3/search/search-companies
     */
    public function searchCompanies(string $query, array $parameters = []): CompanyListResponse
    {
        $response = $this->client->get('search/company', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return CompanyListResponse::decode($response);
    }

    /**
     * Search for collections.
     *
     * @see https://developers.themoviedb.org/3/search/search-collections
     */
    public function searchCollections(string $query, array $parameters = []): CollectionListResponse
    {
        $response = $this->client->get('search/collection', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return CollectionListResponse::decode($response);
    }

    /**
     * Search for keywords.
     *
     * @see https://developers.themoviedb.org/3/search/search-keywords
     */
    public function searchKeywords(string $query, array $parameters = []): KeywordListResponse
    {
        $response = $this->client->get('search/keyword', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return KeywordListResponse::decode($response);
    }

    /**
     * Search for movies.
     *
     * @see https://developers.themoviedb.org/3/search/search-movies
     */
    public function searchMovies(string $query, array $parameters = []): MovieListResponse
    {
        $response = $this->client->get('search/movie', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return MovieListResponse::decode($response);
    }

    /**
     * Search for people.
     *
     * @see https://developers.themoviedb.org/3/search/search-people
     */
    public function searchPeople(string $query, array $parameters = []): PersonListResponse
    {
        $response = $this->client->get('search/person', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return PersonListResponse::decode($response);
    }

    /**
     * Search for a TV show.
     *
     * @see https://developers.themoviedb.org/3/search/search-tv-shows
     */
    public function searchTv(string $query, array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('search/tv', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return TvShowListResponse::decode($response);
    }

    /**
     * Search multiple models in a single request. Multi search currently supports
     * searching for movies, tv shows and people in a single request.
     *
     * @see https://developers.themoviedb.org/3/search/multi-search
     */
    public function searchCombined(string $query, array $parameters = []): CombinedSearchResponse
    {
        $response = $this->client->get('search/multi', array_merge([
            'query' => urlencode($query),
        ], $parameters));

        return CombinedSearchResponse::decode($response);
    }
}
