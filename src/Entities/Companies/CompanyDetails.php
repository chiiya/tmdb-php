<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Companies;

use Chiiya\Tmdb\Entities\Common\AlternativeName;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CompanyDetails extends Company
{
    public string $description;
    public string $headquarters;
    public string $homepage;
    public ?Company $parent_company;

    /** @var AlternativeName[]|null */
    #[CastWith(ArrayCaster::class, AlternativeName::class)]
    #[MapFrom('alternative_names.results')]
    public ?array $alternative_names;

    /** @var LogoImage[]|null */
    #[CastWith(ArrayCaster::class, LogoImage::class)]
    #[MapFrom('images.logos')]
    public ?array $logos;
}
