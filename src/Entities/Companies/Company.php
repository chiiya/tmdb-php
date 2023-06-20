<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Companies;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class Company extends DataTransferObject
{
    public int $id;
    public string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $logo_path;
    public ?string $origin_country;
}
