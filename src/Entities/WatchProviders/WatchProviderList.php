<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\WatchProviders;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class WatchProviderList extends DataTransferObject
{
    public string $country;
    public string $link;

    /** @var WatchProvider[] */
    #[CastWith(ArrayCaster::class, WatchProvider::class)]
    public ?array $flatrate;

    /** @var WatchProvider[] */
    #[CastWith(ArrayCaster::class, WatchProvider::class)]
    public ?array $rent;

    /** @var WatchProvider[] */
    #[CastWith(ArrayCaster::class, WatchProvider::class)]
    public ?array $buy;
}
