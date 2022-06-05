<?php

namespace Chiiya\Tmdb\Entities\Movies;

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