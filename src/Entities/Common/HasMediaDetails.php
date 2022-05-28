<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Companies\Company;
use Chiiya\Tmdb\Entities\Configuration\Country;
use Chiiya\Tmdb\Entities\Configuration\Language;
use Chiiya\Tmdb\Entities\Genre;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

trait HasMediaDetails
{
    #[CastWith(NullableStringCaster::class)]
    public ?string $homepage;
    public string $status;

    #[CastWith(NullableStringCaster::class)]
    public ?string $tagline;

    /** @var Genre[] */
    #[CastWith(ArrayCaster::class, Genre::class)]
    public array $genres;

    /** @var Company[] */
    #[CastWith(ArrayCaster::class, Company::class)]
    public array $production_companies;

    /** @var Country[] */
    #[CastWith(ArrayCaster::class, Country::class)]
    public array $production_countries;

    /** @var Language[] */
    #[CastWith(ArrayCaster::class, Language::class)]
    public array $spoken_languages;
}
