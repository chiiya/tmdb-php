<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Collections\Collection;
use Chiiya\Tmdb\Entities\Collections\Translation;
use Chiiya\Tmdb\Responses\CollectionImagesResponse;

class CollectionRepository extends BaseRepository
{
    /**
     * Get collection details by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-details
     *
     * @param mixed $parameters
     */
    public function getCollection(int|string $id, $parameters = []): Collection
    {
        $response = $this->client->get('collection/'.$id, $parameters);

        return new Collection($response);
    }

    /**
     * Get the images for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-images
     *
     * @param mixed $parameters
     */
    public function getImages(int|string $id, $parameters = []): CollectionImagesResponse
    {
        $response = $this->client->get("collection/{$id}/images", $parameters);

        return new CollectionImagesResponse($response);
    }

    /**
     * Get the list translations for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-translations
     *
     * @param mixed $parameters
     *
     * @return Translation[]
     */
    public function getTranslations(int|string $id, $parameters = []): array
    {
        $response = $this->client->get("collection/{$id}/translations", $parameters)['translations'];

        return Translation::arrayOf($response);
    }
}
