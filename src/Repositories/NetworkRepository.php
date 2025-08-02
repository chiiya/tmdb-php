<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\AlternativeName;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Networks\NetworkDetails;

class NetworkRepository extends BaseRepository
{
    /**
     * Get the details of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-details
     */
    public function getNetwork(int|string $id, array $parameters = []): NetworkDetails
    {
        $response = $this->client->get('network/'.$id, $parameters);

        return NetworkDetails::decode($response);
    }

    /**
     * Get the alternative names of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-alternative-names
     *
     * @return AlternativeName[]
     */
    public function getAlternativeNames(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("network/{$id}/alternative_names", $parameters)['results'] ?? [];

        return array_map(fn (array $item) => AlternativeName::decode($item), $response);
    }

    /**
     * Get the TV network logos by id.
     *
     * There are two image formats that are supported for networks, PNGs and SVGs. You can see
     * which type the original file is by looking at the file_type field. We prefer SVGs as they
     * are resolution independent and as such, the width and height are only there to reflect the
     * original asset that was uploaded. An SVG can be scaled properly beyond those dimensions if
     * you call them as a PNG.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-images
     * @see https://developers.themoviedb.org/3/getting-started/images
     *
     * @return LogoImage[]
     */
    public function getImages(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("network/{$id}/images", $parameters)['logos'] ?? [];

        return array_map(fn (array $item) => LogoImage::decode($item), $response);
    }
}
