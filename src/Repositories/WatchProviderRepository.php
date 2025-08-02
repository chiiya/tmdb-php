<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Configuration\Country;
use Chiiya\Tmdb\Entities\WatchProviders\WatchProvider;

class WatchProviderRepository extends BaseRepository
{
    /**
     * Returns a list of all of the countries we have watch provider (OTT/streaming) data for.
     *
     * @see https://developers.themoviedb.org/3/watch-providers/get-available-regions
     *
     * @return Country[]
     */
    public function getAvailableRegions(array $parameters = []): array
    {
        $response = $this->client->get('watch/providers/regions', $parameters)['results'];

        return array_map(fn (array $item) => Country::decode($item), $response);
    }

    /**
     * Returns a list of the watch provider (OTT/streaming) data we have available for movies. You can
     * specify a watch_region param if you want to further filter the list by country.
     *
     * @see https://developers.themoviedb.org/3/watch-providers/get-movie-providers
     *
     * @return WatchProvider[]
     */
    public function getMovieProviders(array $parameters = []): array
    {
        $response = $this->client->get('watch/providers/movie', $parameters)['results'];

        return array_map(fn (array $item) => WatchProvider::decode($item), $response);
    }

    /**
     * Returns a list of the watch provider (OTT/streaming) data we have available for TV series. You can
     * specify a watch_region param if you want to further filter the list by country.
     *
     * @see https://developers.themoviedb.org/3/watch-providers/get-tv-providers
     *
     * @return WatchProvider[]
     */
    public function getTvProviders(array $parameters = []): array
    {
        $response = $this->client->get('watch/providers/tv', $parameters)['results'];

        return array_map(fn (array $item) => WatchProvider::decode($item), $response);
    }
}
