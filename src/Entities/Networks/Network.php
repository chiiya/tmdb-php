<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Networks;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class Network extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $origin_country;

    #[CastWith(NullableStringCaster::class)]
    public ?string $logo_path;
}
