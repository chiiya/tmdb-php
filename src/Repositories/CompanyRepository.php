<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Common\AlternativeName;
use Chiiya\Tmdb\Entities\Companies\CompanyDetails;
use Chiiya\Tmdb\Entities\Images\LogoImage;

class CompanyRepository extends BaseRepository
{
    /**
     * Get a companies details by id.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-details
     */
    public function getCompany(int|string $id, $parameters = []): CompanyDetails
    {
        $response = $this->client->get('company/'.$id, $parameters);

        return new CompanyDetails($response);
    }

    /**
     * Get the alternative names of a company.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-alternative-names
     *
     * @return AlternativeName[]
     */
    public function getAlternativeNames(int|string $id, $parameters = []): array
    {
        $response = $this->client->get("company/{$id}/alternative_names", $parameters)['results'] ?? [];

        return AlternativeName::arrayOf($response);
    }

    /**
     * Get a companies logos by id.
     *
     * There are two image formats that are supported for companies, PNGs and SVGs. You can see
     * which type the original file is by looking at the file_type field. We prefer SVGs as they
     * are resolution independent and as such, the width and height are only there to reflect the
     * original asset that was uploaded. An SVG can be scaled properly beyond those dimensions if
     * you call them as a PNG.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-images
     * @see https://developers.themoviedb.org/3/getting-started/images
     *
     * @return LogoImage[]
     */
    public function getImages(int|string $id, $parameters = []): array
    {
        $response = $this->client->get("company/{$id}/images", $parameters)['logos'] ?? [];

        return LogoImage::arrayOf($response);
    }
}
