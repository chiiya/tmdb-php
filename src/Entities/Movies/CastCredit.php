<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\People\HasCastAttributes;
use Chiiya\Tmdb\Entities\People\HasPersonAttributes;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class CastCredit extends DataTransferObject
{
    use HasCastAttributes;
    use HasPersonAttributes;

    #[CastWith(NullableStringCaster::class)]
    public ?string $original_name;
    public int $cast_id;
    public int $order;
}
