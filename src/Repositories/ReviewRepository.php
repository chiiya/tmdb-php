<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Reviews\ReviewDetails;

class ReviewRepository extends BaseRepository
{
    /**
     * Retrieve the details of a movie or TV show review.
     *
     * @see https://developers.themoviedb.org/3/reviews/get-review-details
     */
    public function getReview(string $id, array $parameters = []): ReviewDetails
    {
        $response = $this->client->get('review/'.$id, $parameters);

        return ReviewDetails::decode($response);
    }
}
