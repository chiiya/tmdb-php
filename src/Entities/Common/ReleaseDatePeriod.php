<?php

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ReleaseDatePeriod extends DataTransferObject
{
    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public DateTimeImmutable $minimum;
    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public DateTimeImmutable $maximum;
}
