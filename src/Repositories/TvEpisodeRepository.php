<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\StillImage;
use Chiiya\Tmdb\Entities\Television\ExternalIds;
use Chiiya\Tmdb\Entities\Television\TelevisionTranslation;
use Chiiya\Tmdb\Entities\Television\TvEpisodeDetails;

class TvEpisodeRepository extends BaseRepository
{
    /**
     * Get the TV episode details by id. Supports append_to_response.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-details
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getEpisode(int|string $id, int $season, int $episode, array $parameters = []): TvEpisodeDetails
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/episode/{$episode}", $parameters);

        return new TvEpisodeDetails($response);
    }

    /**
     * Get the changes for a TV episode. By default only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date
     * query parameters.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-changes
     *
     * @return Change[]
     */
    public function getChanges(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("tv/episode/{$id}/changes", $parameters)['changes'] ?? [];

        return Change::arrayOf($response);
    }

    /**
     * Get the credits (cast, crew and guest stars) for a TV episode.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getCredits(int|string $id, int $season, int $episode, array $parameters = []): Credits
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/episode/{$episode}/credits", $parameters);

        return new Credits($response);
    }

    /**
     * Get the external ids for a TV episode.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-external-ids
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getExternalIds(int|string $id, int $season, int $episode, array $parameters = []): ExternalIds
    {
        $response = $this->client->get("tv/{$id}/season/{$season}/episode/{$episode}/external_ids", $parameters);

        return new ExternalIds($response);
    }

    /**
     * Get the images that belong to a TV episode.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-images
     *
     * @return StillImage[]
     */
    public function getImages(int|string $id, int $season, int $episode, array $parameters = []): array
    {
        $response = $this->client->get(
            "tv/{$id}/season/{$season}/episode/{$episode}/images",
            $parameters,
        )['stills'] ?? [];

        return StillImage::arrayOf($response);
    }

    /**
     * Get the translation data for an episode.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-translations
     *
     * @return TelevisionTranslation[]
     */
    public function getTranslations(int|string $id, int $season, int $episode, array $parameters = []): array
    {
        $response = $this->client->get(
            "tv/{$id}/season/{$season}/episode/{$episode}/translations",
            $parameters,
        )['translations'] ?? [];

        return TelevisionTranslation::arrayOf($response);
    }

    /**
     * Get the videos that have been added to a TV episode.
     *
     * @see https://developers.themoviedb.org/3/tv-episodes/get-tv-episode-videos
     *
     * @return Video[]
     */
    public function getVideos(int|string $id, int $season, int $episode, array $parameters = []): array
    {
        $response = $this->client->get(
            "tv/{$id}/season/{$season}/episode/{$episode}/videos",
            $parameters,
        )['results'] ?? [];

        return Video::arrayOf($response);
    }
}
