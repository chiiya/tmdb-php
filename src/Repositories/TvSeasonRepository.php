<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;
use Chiiya\Tmdb\Entities\Television\ExternalIds;
use Chiiya\Tmdb\Entities\Television\TelevisionTranslation;
use Chiiya\Tmdb\Entities\Television\TvSeasonDetails;

class TvSeasonRepository extends BaseRepository
{
    /**
     * Get the TV season details by id. Supports append_to_response.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-details
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getTvSeason(int|string $id, int $season, array $parameters = []): TvSeasonDetails
    {
        $response = $this->client->get("tv/{$id}/season/{$season}", $parameters);

        return new TvSeasonDetails($response);
    }

    /**
     * Get the aggregate credits for TV season.
     *
     * This call differs from the main credits call in that it does not only return the season
     * credits, but rather is a view of all the cast & crew for all of the episodes belonging
     * to a season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-aggregate-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getAggregateCredits(int|string $id, int $season, array $parameters = []): AggregateCredits
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/aggregate_credits", $parameters);

        return new AggregateCredits($response);
    }

    /**
     * Get the changes for a TV season. By default only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date
     * query parameters.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-changes
     *
     * @return Change[]
     */
    public function getChanges(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/season/{$id}/changes", $parameters)['changes'] ?? [];

        return Change::arrayOf($response);
    }

    /**
     * Get the credits for TV season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getCredits(int|string $id, int $season, array $parameters = []): Credits
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/credits", $parameters);

        return new Credits($response);
    }

    /**
     * Get the external ids for a TV season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-external-ids
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getExternalIds(int|string $id, int $season, array $parameters = []): ExternalIds
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/external_ids", $parameters);

        return new ExternalIds($response);
    }

    /**
     * Get the images that belong to a TV season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-images
     *
     * @return PosterImage[]
     */
    public function getImages(int|string $id, int $season, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/images", $parameters)['posters'] ?? [];

        return PosterImage::arrayOf($response);
    }

    /**
     * Get the translation data for a TV season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-translations
     *
     * @return TelevisionTranslation[]
     */
    public function getTranslations(int|string $id, int $season, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/translations", $parameters)['translations'] ?? [];

        return TelevisionTranslation::arrayOf($response);
    }

    /**
     * Get the videos that have been added to a TV season.
     *
     * @see https://developers.themoviedb.org/3/tv-seasons/get-tv-season-videos
     *
     * @return Video[]
     */
    public function getVideos(int|string $id, int $season, array $parameters = []): array
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/videos", $parameters)['results'] ?? [];

        return Video::arrayOf($response);
    }
}
