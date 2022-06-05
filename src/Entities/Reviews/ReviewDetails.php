<?php

namespace Chiiya\Tmdb\Entities\Reviews;

use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ReviewDetails extends Review
{
    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_639_1')]
    public ?string $language;
    public int $media_id;
    public string $media_title;
    public string $media_type;
}
