<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Companies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Common\AlternativeName;
use Chiiya\Tmdb\Entities\Images\LogoImage;

class CompanyDetails extends Company
{
    public function __construct(
        #[Cast(NullableStringCaster::class)]
        public ?string $description = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $headquarters = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
        public ?Company $parent_company = null,
        /** @var AlternativeName[] */
        #[Cast(ArrayCaster::class, AlternativeName::class)]
        #[Map(from: 'alternative_names.results')]
        public ?array $alternative_names = [],
        /** @var LogoImage[] */
        #[Cast(ArrayCaster::class, LogoImage::class)]
        #[Map(from: 'images.logos')]
        public ?array $logos = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
