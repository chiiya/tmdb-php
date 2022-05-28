<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Entities\Configuration\Configuration;
use Chiiya\Tmdb\Entities\Configuration\Country;
use Chiiya\Tmdb\Entities\Configuration\Job;
use Chiiya\Tmdb\Entities\Configuration\Language;
use Chiiya\Tmdb\Entities\Configuration\Timezone;

class ConfigurationRepository extends BaseRepository
{
    /**
     * Get the system wide configuration information. Some elements of the API require some
     * knowledge of this configuration data. The purpose of this is to try and keep the actual
     * API responses as light as possible. It is recommended you cache this data within your
     * application and check for updates every few days.
     *
     * This method currently holds the data relevant to building image URLs as well as the
     * change key map.
     *
     * To build an image URL, you will need 3 pieces of data. The base_url, size and file_path.
     * Simply combine them all and you will have a fully qualified URL. Here’s an example URL:
     *
     * https://image.tmdb.org/t/p/w500/8uO0gUM8aNqYLs1OsTBQiXu0fEv.jpg
     *
     * The configuration method also contains the list of change keys which can be useful if you
     * are building an app that consumes data from the change feed.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-api-configuration
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function getApiConfiguration(array $parameters = []): Configuration
    {
        $response = $this->client->get('configuration', $parameters);

        return new Configuration($response);
    }

    /**
     * Get the list of countries (ISO 3166-1 tags) used throughout TMDB.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-countries
     *
     * @return Country[]
     */
    public function getCountries(array $parameters = []): array
    {
        $response = $this->client->get('configuration/countries', $parameters);

        return Country::arrayOf($response);
    }

    /**
     * Get a list of the jobs and departments we use on TMDB.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-jobs
     *
     * @return Job[]
     */
    public function getJobs(array $parameters = []): array
    {
        $response = $this->client->get('configuration/jobs', $parameters);

        return Job::arrayOf($response);
    }

    /**
     * Get the list of languages (ISO 639-1 tags) used throughout TMDB.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-languages
     *
     * @return Language[]
     */
    public function getLanguages(array $parameters = []): array
    {
        $response = $this->client->get('configuration/languages', $parameters);

        return Language::arrayOf($response);
    }

    /**
     * Get a list of the officially supported translations on TMDB.
     *
     * While it's technically possible to add a translation in any one of the languages we have
     * added to TMDB (we don't restrict content), the ones listed in this method are the ones we
     * also support for localizing the website with which means they are what we refer to as
     * the "primary" translations.
     *
     * These are all specified as IETF tags to identify the languages we use on TMDB. There is one
     * exception which is image languages. They are currently only designated by a ISO-639-1 tag.
     * This is a planned upgrade for the future.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-primary-translations
     *
     * @return string[]
     */
    public function getPrimaryTranslations(array $parameters = []): array
    {
        return $this->client->get('configuration/primary_translations', $parameters);
    }

    /**
     * Get the list of timezones used throughout TMDB.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-timezones
     *
     * @return Timezone[]
     */
    public function getTimezones(array $parameters = []): array
    {
        $response = $this->client->get('configuration/timezones', $parameters);

        return Timezone::arrayOf($response);
    }
}
