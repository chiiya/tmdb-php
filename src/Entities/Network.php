<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities;

use Chiiya\Tmdb\Entities\Common\AlternativeName;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Network extends DataTransferObject
{
    public string $headquarters;
    public string $homepage;
    public int $id;
    public ?string $logo_path;
    public string $name;
    public string $origin_country;

    /** @var AlternativeName[]|null */
    #[CastWith(ArrayCaster::class, AlternativeName::class)]
    #[MapFrom('alternative_names.results')]
    public ?array $alternative_names;

    /** @var LogoImage[]|null */
    #[CastWith(ArrayCaster::class, LogoImage::class)]
    #[MapFrom('images.logos')]
    public ?array $logos;
}
