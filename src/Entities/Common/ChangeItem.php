<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ChangeItem extends DataTransferObject
{
    public string $id;
    public string $action;
    public string $time;
    public mixed $value;
    public mixed $original_value;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_639_1')]
    public ?string $iso6391;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_3166_1')]
    public ?string $iso31661;
}
