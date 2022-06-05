<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Movies\AlternativeTitle;
use Chiiya\Tmdb\Entities\Movies\Credits;
use Chiiya\Tmdb\Entities\Movies\ExternalIds;
use Chiiya\Tmdb\Entities\Movies\MovieDetails;
use Chiiya\Tmdb\Entities\Movies\MovieTranslation;
use Chiiya\Tmdb\Entities\Movies\ReleaseDateList;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProviderList;
use Chiiya\Tmdb\Responses\ImagesResponse;
use Chiiya\Tmdb\Responses\MovieListResponse;
use Chiiya\Tmdb\Responses\ReviewsResponse;
use Chiiya\Tmdb\Responses\TimeRestrictedMovieListResponse;

class MovieRepository extends BaseRepository
{
    /**
     * Get the primary information about a movie. Supports append_to_response
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-details
     */
    public function getMovie(int|string $id, array $parameters = []): MovieDetails
    {
        $response = $this->client->get("movie/{$id}", $parameters);

        if (isset($response['watch/providers'])) {
            $response['watch_providers'] = $this->getWatchProviderList($response['watch/providers']['results'] ?? []);
        }

        if (isset($response['release_dates'])) {
            $response['release_dates'] = $this->getReleaseDatesList($response['release_dates']['results'] ?? []);
        }

        return new MovieDetails($response);
    }

    /**
     * Get all of the alternative titles for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-alternative-titles
     *
     * @return AlternativeTitle[]
     */
    public function getAlternativeTitles(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/alternative_titles", $parameters)['titles'] ?? [];

        return AlternativeTitle::arrayOf($response);
    }

    /**
     * Get the changes for a movie. By default, only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date
     * query parameters.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-changes
     *
     * @return Change[]
     */
    public function getChanges(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/changes", $parameters)['changes'] ?? [];

        return Change::arrayOf($response);
    }

    /**
     * Get the cast and crew for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getCredits(int|string $id, array $parameters = []): Credits
    {
        $response = $this->client->get("movie/{$id}/credits", $parameters);

        return new Credits($response);
    }

    /**
     * Get the external ids for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-external-ids
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getExternalIds(int|string $id, array $parameters = []): ExternalIds
    {
        $response = $this->client->get("movie/{$id}/external_ids", $parameters);

        return new ExternalIds($response);
    }

    /**
     * Get the images that belong to a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-images
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getImages(int|string $id, array $parameters = []): ImagesResponse
    {
        $response = $this->client->get("movie/{$id}/images", $parameters);

        return new ImagesResponse($response);
    }

    /**
     * Get the keywords that have been added to a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-keywords
     * @return array<int, Keyword>
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getKeywords(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/keywords", $parameters)['keywords'] ?? [];

        return Keyword::arrayOf($response);
    }

    /**
     * Get a list of recommended movies for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-recommendations
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getRecommendations(int|string $id, array $parameters = []): MovieListResponse
    {
        $response = $this->client->get("movie/{$id}/recommendations", $parameters);

        return new MovieListResponse($response);
    }

    /**
     * Get the release date along with the certification for a movie. Release dates support
     * different types:
     *
     * 1 - Premiere
     * 2 - Theatrical (limited)
     * 3 - Theatrical
     * 4 - Digital
     * 5 - Physical
     * 6 - TV
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-release-dates
     * @return array<string, ReleaseDateList>
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getReleaseDates(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/release_dates", $parameters)['results'] ?? [];

        return $this->getReleaseDatesList($response);
    }

    /**
     * Get the user reviews for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-reviews
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getReviews(int|string $id, array $parameters = []): ReviewsResponse
    {
        $response = $this->client->get("movie/{$id}/reviews", $parameters);

        return new ReviewsResponse($response);
    }

    /**
     * Get a list of similar movies. This is not the same as the "Recommendation" system you
     * see on the website.
     *
     * These items are assembled by looking at keywords and genres.
     *
     * @see https://developers.themoviedb.org/3/movies/get-similar-movies
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getSimilarMovies(int|string $id, array $parameters = []): MovieListResponse
    {
        $response = $this->client->get("movie/{$id}/similar", $parameters);

        return new MovieListResponse($response);
    }

    /**
     * Get a list of translations that have been created for a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-translations
     *
     * @return MovieTranslation[]
     */
    public function getTranslations(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/translations", $parameters)['translations'] ?? [];

        return MovieTranslation::arrayOf($response);
    }

    /**
     * Get the videos that have been added to a movie.
     *
     * @see https://developers.themoviedb.org/3/movies/get-movie-videos
     * @noinspection PhpUnhandledExceptionInspection
     * @return Video[]
     */
    public function getVideos(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/videos", $parameters)['results'] ?? [];

        return Video::arrayOf($response);
    }

    /**
     * Powered by our partnership with JustWatch, you can query this method to get a list
     * of the availabilities per country by provider.
     *
     * This is not going to return full deep links, but rather, it's just enough information
     * to display what's available where.
     *
     * You can link to the provided TMDB URL to help support TMDB and provide the actual
     * deep links to the content.
     *
     * Please note: In order to use this data you must attribute the source of the data as
     * JustWatch. If we find any usage not complying with these terms we will revoke access
     * to the API.
     *
     * @see https://developers.themoviedb.org/3/movies/get-latest-movie
     * @noinspection PhpUnhandledExceptionInspection
     * @return WatchProviderList[]
     */
    public function getWatchProviders(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("movie/{$id}/watch/providers", $parameters)['results'] ?? [];

        return $this->getWatchProviderList($response);
    }

    /**
     * Get the most newly created movie. This is a live response and will continuously change.
     *
     * @see https://developers.themoviedb.org/3/movies/get-latest-movie
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getLatest(array $parameters = []): MovieDetails
    {
        $response = $this->client->get('movie/latest', $parameters);

        return new MovieDetails($response);
    }

    /**
     * Get a list of movies in theatres. This is a release type query that looks for all
     * movies that have a release type of 2 or 3 within the specified date range.
     *
     * You can optionally specify a region parameter which will narrow the search to only
     * look for theatrical release dates within the specified country.
     *
     * @see https://developers.themoviedb.org/3/movies/get-now-playing
     * @noinspection PhpUnhandledExceptionInspection*/
    public function getNowPlaying(array $parameters = []): TimeRestrictedMovieListResponse
    {
        $response = $this->client->get('movie/now_playing', $parameters);

        return new TimeRestrictedMovieListResponse($response);
    }

    /**
     * Get a list of the current popular movies on TMDB. This list updates daily.
     *
     * @see https://developers.themoviedb.org/3/movies/get-popular-movies
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getPopular(array $parameters = []): MovieListResponse
    {
        $response = $this->client->get('movie/popular', $parameters);

        return new MovieListResponse($response);
    }

    /**
     * Get the top-rated movies on TMDB.
     *
     * @see https://developers.themoviedb.org/3/movies/get-top-rated-movies
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getTopRated(array $parameters = []): MovieListResponse
    {
        $response = $this->client->get('movie/top_rated', $parameters);

        return new MovieListResponse($response);
    }

    /**
     * Get a list of upcoming movies in theatres. This is a release type query that looks for all
     * movies that have a release type of 2 or 3 within the specified date range.
     *
     * You can optionally specify a region parameter which will narrow the search to only look for
     * theatrical release dates within the specified country.
     *
     * @see https://developers.themoviedb.org/3/movies/get-upcoming
     * @noinspection PhpUnhandledExceptionInspection*/
    public function getUpcoming(array $parameters = []): TimeRestrictedMovieListResponse
    {
        $response = $this->client->get('movie/upcoming', $parameters);

        return new TimeRestrictedMovieListResponse($response);
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    protected function getWatchProviderList(array $results): array
    {
        $items = [];

        foreach ($results as $country => $certifications) {
            $items[$country] = new WatchProviderList(array_merge([
                'country' => $country
            ], $certifications));
        }

        return $items;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    protected function getReleaseDatesList(array $results): array
    {
        $items = [];

        foreach ($results as $country) {
            $items[$country['iso_3166_1']] = new ReleaseDateList($country);
        }

        return $items;
    }
}
