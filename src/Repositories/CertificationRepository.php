<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Certifications\CertificationList;

class CertificationRepository extends BaseRepository
{
    /**
     * Get an up-to-date list of the officially supported movie certifications on TMDB.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-movie-certifications
     *
     * @return array<string, CertificationList>
     */
    public function getMovieCertifications(array $parameters = []): array
    {
        $response = $this->client->get('certification/movie/list', $parameters)['certifications'];

        return $this->getCertificationList($response);
    }

    /**
     * Get an up-to-date list of the officially supported TV show certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-tv-certifications
     *
     * @return array<string, CertificationList>
     */
    public function getTvCertifications(array $parameters = []): array
    {
        $response = $this->client->get('certification/tv/list', $parameters)['certifications'];

        return $this->getCertificationList($response);
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    protected function getCertificationList(array $results): array
    {
        $items = [];

        foreach ($results as $country => $certifications) {
            $items[$country] = new CertificationList(country: $country, certifications: $certifications);
        }

        return $items;
    }
}
