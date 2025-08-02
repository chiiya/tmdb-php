<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Companies\Company;
use Chiiya\Tmdb\Entities\Configuration\Language;
use Chiiya\Tmdb\Entities\Genre;
use Chiiya\Tmdb\Entities\Movies\ProductionCountry;

abstract class DetailedMedia extends Media
{
    public function __construct(
        public string $status,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $tagline = null,
        /** @var Genre[] */
        #[Cast(ArrayCaster::class, Genre::class)]
        public array $genres = [],
        /** @var Company[] */
        #[Cast(ArrayCaster::class, Company::class)]
        public array $production_companies = [],
        /** @var ProductionCountry[] */
        #[Cast(ArrayCaster::class, ProductionCountry::class)]
        public array $production_countries = [],
        /** @var Language[] */
        #[Cast(ArrayCaster::class, Language::class)]
        public array $spoken_languages = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
