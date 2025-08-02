<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\WatchProviders;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class WatchProviderList extends DataTransferObject
{
    public function __construct(
        public string $country,
        public string $link,
        /** @var WatchProvider[] */
        #[Cast(ArrayCaster::class, WatchProvider::class)]
        public array $flatrate = [],
        /** @var WatchProvider[] */
        #[Cast(ArrayCaster::class, WatchProvider::class)]
        public array $rent = [],
        /** @var WatchProvider[] */
        #[Cast(ArrayCaster::class, WatchProvider::class)]
        public array $buy = [],
    ) {}
}
