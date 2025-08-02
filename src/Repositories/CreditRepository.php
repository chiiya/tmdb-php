<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Credits\CreditDetails;

class CreditRepository extends BaseRepository
{
    /**
     * Get a movie or TV credit details by id.
     *
     * @see https://developers.themoviedb.org/3/credits/get-credit-details
     */
    public function getCredit(string $id, array $parameters = []): CreditDetails
    {
        $response = $this->client->get("credit/{$id}", $parameters);
        $response['media']['media_type'] = $response['media_type'];

        return CreditDetails::decode($response);
    }
}
