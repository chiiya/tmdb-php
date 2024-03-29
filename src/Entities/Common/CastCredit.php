<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\People\HasCastAttributes;
use Chiiya\Tmdb\Entities\People\HasPersonAttributes;
use Spatie\DataTransferObject\Attributes\CastWith;

class CastCredit extends DataTransferObject
{
    use HasCastAttributes;
    use HasPersonAttributes;
    public ?int $id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $original_name;
    public ?int $cast_id;
    public int $order;
}
