<?php

namespace Chiiya\Tmdb\Entities\WatchProviders;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

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
