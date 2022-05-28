<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AlternativeName extends DataTransferObject
{
    public string $name;

    #[CastWith(NullableStringCaster::class)]
    public ?string $type;
}
