<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\WatchProviders;

use Chiiya\Tmdb\Entities\Configuration\Country;

class Region extends Country
{
    public string $native_name;
}
