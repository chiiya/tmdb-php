<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Reviews\Review;

class ReviewRepository extends BaseRepository
{
    /**
     * Retrieve the details of a movie or TV show review.
     *
     * @see https://developers.themoviedb.org/3/reviews/get-review-details
     */
    public function getReview(string $id, $parameters = []): Review
    {
        $response = $this->client->get('review/'.$id, $parameters);

        return new Review($response);
    }
}
