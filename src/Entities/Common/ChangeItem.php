<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ChangeItem extends DataTransferObject
{
    public string $id;
    public string $action;
    public string $time;
    public mixed $value;
    public mixed $original_value;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_639_1')]
    public ?string $language;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_3166_1')]
    public ?string $country;
}
