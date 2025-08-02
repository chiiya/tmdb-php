<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\AlternativeTitle;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Keyword;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Television\ContentRating;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;
use Chiiya\Tmdb\Entities\Television\EpisodeGroups\EpisodeGroupList;
use Chiiya\Tmdb\Entities\Television\ScreenedTheatrically;
use Chiiya\Tmdb\Entities\Television\TelevisionTranslation;
use Chiiya\Tmdb\Entities\Television\TvShowDetails;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProviderList;
use Chiiya\Tmdb\Responses\ImagesResponse;
use Chiiya\Tmdb\Responses\ReviewsResponse;
use Chiiya\Tmdb\Responses\TvShowListResponse;

class TvShowRepository extends BaseRepository
{
    /**
     * Get the primary TV show details by id. Supports append_to_response.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-details
     */
    public function getTvShow(int|string $id, array $parameters = []): TvShowDetails
    {
        $response = $this->client->get("tv/{$id}", $parameters);

        if (isset($response['watch/providers'])) {
            $response['watch_providers'] = $this->getWatchProviderList($response['watch/providers']['results'] ?? []);
        }

        return TvShowDetails::decode($response);
    }

    /**
     * Get the aggregate credits (cast and crew) that have been added to a TV show.
     *
     * This call differs from the main credits call in that it does not return the newest
     * season but rather, is a view of all the entire cast & crew for all episodes
     * belonging to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-aggregate-credits
     */
    public function getAggregateCredits(int|string $id, array $parameters = []): AggregateCredits
    {
        $response = $this->client->get("tv/{$id}/aggregate_credits", $parameters);

        return AggregateCredits::decode($response);
    }

    /**
     * Returns all of the alternative titles for a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-alternative-titles
     *
     * @return AlternativeTitle[]
     */
    public function getAlternativeTitles(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/alternative_titles", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => AlternativeTitle::decode($item), $response);
    }

    /**
     * Get the changes for a TV show. By default only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date
     * query parameters.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-changes
     *
     * @return Change[]
     */
    public function getChanges(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/changes", $parameters)['changes'] ?? [];

        return array_map(fn (array $item) => Change::decode($item), $response);
    }

    /**
     * Get the list of content ratings (certifications) that have been added to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-content-ratings
     *
     * @return array<int, ContentRating>
     */
    public function getContentRatings(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/content_ratings", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => ContentRating::decode($item), $response);
    }

    /**
     * Get the credits (cast and crew) that have been added to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-credits
     */
    public function getCredits(int|string $id, array $parameters = []): Credits
    {
        $response = $this->client->get("tv/{$id}/credits", $parameters);

        return Credits::decode($response);
    }

    /**
     * Get all of the episode groups that have been created for a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-episode-groups
     *
     * @return array<int, EpisodeGroupList>
     */
    public function getEpisodeGroups(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/episode_groups", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => EpisodeGroupList::decode($item), $response);
    }

    /**
     * Get the external ids for a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-external-ids
     */
    public function getExternalIds(int|string $id, array $parameters = []): ExternalIds
    {
        $response = $this->client->get("tv/{$id}/external_ids", $parameters);

        return ExternalIds::decode($response);
    }

    /**
     * Get the images that belong to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-images
     */
    public function getImages(int|string $id, array $parameters = []): ImagesResponse
    {
        $response = $this->client->get("tv/{$id}/images", $parameters);

        return ImagesResponse::decode($response);
    }

    /**
     * Get the keywords that have been added to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-keywords
     *
     * @return array<int, Keyword>
     */
    public function getKeywords(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/keywords", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => Keyword::decode($item), $response);
    }

    /**
     * Get the list of TV show recommendations for this item.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-recommendations
     */
    public function getRecommendations(int|string $id, array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get("tv/{$id}/recommendations", $parameters);

        return TvShowListResponse::decode($response);
    }

    /**
     * Get the reviews for a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-reviews
     */
    public function getReviews(int|string $id, array $parameters = []): ReviewsResponse
    {
        $response = $this->client->get("tv/{$id}/reviews", $parameters);

        return ReviewsResponse::decode($response);
    }

    /**
     * Get a list of seasons or episodes that have been screened in a film festival or theatre.
     *
     * @see https://developers.themoviedb.org/3/tv/get-screened-theatrically
     *
     * @return ScreenedTheatrically[]
     */
    public function getScreenedTheatrically(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/screened_theatrically", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => ScreenedTheatrically::decode($item), $response);
    }

    /**
     * Get a list of similar TV shows. These items are assembled by looking at keywords and genres.
     *
     * @see https://developers.themoviedb.org/3/tv/get-similar-tv-shows
     */
    public function getSimilar(int|string $id, array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get("tv/{$id}/similar", $parameters);

        return TvShowListResponse::decode($response);
    }

    /**
     * Get a list of the translations that exist for a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-translations
     *
     * @return TelevisionTranslation[]
     */
    public function getTranslations(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/translations", $parameters)['translations'] ?? [];

        return array_map(fn (array $item) => TelevisionTranslation::decode($item), $response);
    }

    /**
     * Get the videos that have been added to a TV show.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-videos
     *
     * @return Video[]
     */
    public function getVideos(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/videos", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => Video::decode($item), $response);
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
     * @see https://developers.themoviedb.org/3/tv/get-tv-watch-providers
     *
     * @return WatchProviderList[]
     */
    public function getWatchProviders(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/watch/providers", $parameters)['results'] ?? [];

        return $this->getWatchProviderList($response);
    }

    /**
     * Get the most newly created TV show. This is a live response and will continuously change.
     *
     * @see https://developers.themoviedb.org/3/tv/get-latest-tv
     */
    public function getLatest(array $parameters = []): TvShowDetails
    {
        $response = $this->client->get('tv/latest', $parameters);

        return TvShowDetails::decode($response);
    }

    /**
     * Get a list of TV shows that are airing today. This query is purely day based as we
     * do not currently support airing times.
     *
     * You can specify a timezone to offset the day calculation. Without a specified timezone,
     * this query defaults to EST (Eastern Time UTC-05:00).
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-airing-today
     */
    public function getAiringToday(array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('tv/airing_today', $parameters);

        return TvShowListResponse::decode($response);
    }

    /**
     * Get a list of shows that are currently on the air.
     *
     * This query looks for any TV show that has an episode with an air date in the next 7 days.
     *
     * @see https://developers.themoviedb.org/3/tv/get-tv-on-the-air
     */
    public function getOnTheAir(array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('tv/on_the_air', $parameters);

        return TvShowListResponse::decode($response);
    }

    /**
     * Get a list of the current popular TV shows on TMDB. This list updates daily.
     *
     * @see https://developers.themoviedb.org/3/tv/get-popular-tv-shows
     */
    public function getPopular(array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('tv/popular', $parameters);

        return TvShowListResponse::decode($response);
    }

    /**
     * Get a list of the top-rated TV shows on TMDB.
     *
     * @see https://developers.themoviedb.org/3/tv/get-top-rated-tv
     */
    public function getTopRated(array $parameters = []): TvShowListResponse
    {
        $response = $this->client->get('tv/top_rated', $parameters);

        return TvShowListResponse::decode($response);
    }

    protected function getWatchProviderList(array $results): array
    {
        $items = [];

        foreach ($results as $country => $providers) {
            $items[$country] = WatchProviderList::decode(array_merge([
                'country' => $country,
            ], $providers));
        }

        return $items;
    }
}
