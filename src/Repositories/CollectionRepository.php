<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Collections\CollectionDetails;
use Chiiya\Tmdb\Entities\Collections\CollectionTranslation;
use Chiiya\Tmdb\Responses\ImagesResponse;

class CollectionRepository extends BaseRepository
{
    /**
     * Get collection details by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-details
     */
    public function getCollection(int|string $id, array $parameters = []): CollectionDetails
    {
        $response = $this->client->get('collection/'.$id, $parameters);

        return CollectionDetails::decode($response);
    }

    /**
     * Get the images for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-images
     */
    public function getImages(int|string $id, array $parameters = []): ImagesResponse
    {
        $response = $this->client->get("collection/{$id}/images", $parameters);

        return ImagesResponse::decode($response);
    }

    /**
     * Get the list translations for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-translations
     *
     * @return CollectionTranslation[]
     */
    public function getTranslations(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("collection/{$id}/translations", $parameters)['translations'];

        return array_map(fn (array $item) => CollectionTranslation::decode($item), $response);
    }
}
