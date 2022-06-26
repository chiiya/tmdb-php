<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class AlternativeName extends DataTransferObject
{
    public string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $type;
}
