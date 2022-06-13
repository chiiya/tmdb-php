<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Common\ResponseHelper;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\People\CombinedCredits;
use Chiiya\Tmdb\Entities\People\MovieCredits;
use Chiiya\Tmdb\Entities\People\Person;
use Chiiya\Tmdb\Entities\People\PersonTranslation;
use Chiiya\Tmdb\Entities\People\TvCredits;
use Chiiya\Tmdb\Responses\PopularPeopleResponse;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;

class PersonRepository extends BaseRepository
{
    /**
     * Get the primary person details by id.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-details
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getPerson(int|string $id, array $parameters = []): Person
    {
        $response = $this->client->get("person/{$id}", $parameters);

        return new Person(ResponseHelper::normalizeDiscriminators($response));
    }

    /**
     * Get the changes for a person. By default, only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date
     * query parameters.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-changes
     *
     * @return Change[]
     */
    public function getChanges(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("person/{$id}/changes", $parameters)['changes'] ?? [];

        return Change::arrayOf($response);
    }

    /**
     * Get the movie credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-movie-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getMovieCredits(int|string $id, array $parameters = []): MovieCredits
    {
        $response = $this->client->get("person/{$id}/movie_credits", $parameters);

        return new MovieCredits($response);
    }

    /**
     * Get the TV show credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-tv-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getTvCredits(int|string $id, array $parameters = []): TvCredits
    {
        $response = $this->client->get("person/{$id}/tv_credits", $parameters);

        return new TvCredits($response);
    }

    /**
     * Get the movie and TV credits together in a single response.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-combined-credits
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getCombinedCredits(int|string $id, array $parameters = []): CombinedCredits
    {
        $response = $this->client->get("person/{$id}/combined_credits", $parameters);

        return new CombinedCredits($response);
    }

    /**
     * Get the external ids for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-external-ids
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getExternalIds(int|string $id, array $parameters = []): ExternalIds
    {
        $response = $this->client->get("person/{$id}/external_ids", $parameters);

        return new ExternalIds($response);
    }

    /**
     * Get the images for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-images
     * @see https://developers.themoviedb.org/3/getting-started/images
     *
     * @return ProfileImage[]
     */
    public function getImages(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("person/{$id}/images", $parameters)['profiles'] ?? [];

        return ProfileImage::arrayOf($response);
    }

    /**
     * Get the images that this person has been tagged in.
     *
     * @see https://developers.themoviedb.org/3/people/get-tagged-images
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getTaggedImages(int|string $id, array $parameters = []): TaggedImagesResponse
    {
        $response = $this->client->get("person/{$id}/tagged_images", $parameters);

        return new TaggedImagesResponse(ResponseHelper::normalizeDiscriminators($response));
    }

    /**
     * Get a list of translations that have been created for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-translations
     *
     * @return PersonTranslation[]
     */
    public function getTranslations(int|string $id, array $parameters = []): array
    {
        $response = $this->client->get("person/{$id}/translations", $parameters)['translations'] ?? [];

        return PersonTranslation::arrayOf($response);
    }

    /**
     * Get the most newly created person. This is a live response and will continuously change.
     *
     * @see https://developers.themoviedb.org/3/people/get-latest-person
     */
    public function getLatest(array $parameters = []): Person
    {
        $response = $this->client->get('person/latest', $parameters);

        return new Person($response);
    }

    /**
     * Get the list of popular people on TMDB. This list updates daily.
     *
     * @see https://developers.themoviedb.org/3/people/get-popular-people
     */
    public function getPopular(array $parameters = []): PopularPeopleResponse
    {
        $response = $this->client->get('person/popular', $parameters);

        return new PopularPeopleResponse($response);
    }
}
