<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\People\HasCrewAttributes;
use Chiiya\Tmdb\Entities\People\HasPersonAttributes;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class CrewCredit extends DataTransferObject
{
    use HasCrewAttributes;
    use HasPersonAttributes;

    #[CastWith(NullableStringCaster::class)]
    public ?string $original_name;
}
