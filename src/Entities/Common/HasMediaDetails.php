<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Companies\Company;
use Chiiya\Tmdb\Entities\Configuration\Language;
use Chiiya\Tmdb\Entities\Genre;
use Chiiya\Tmdb\Entities\Movies\ProductionCountry;
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

    /** @var ProductionCountry[] */
    #[CastWith(ArrayCaster::class, ProductionCountry::class)]
    public array $production_countries;

    /** @var Language[] */
    #[CastWith(ArrayCaster::class, Language::class)]
    public array $spoken_languages;
}
