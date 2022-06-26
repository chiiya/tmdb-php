<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;

class ReleaseDatePeriod extends DataTransferObject
{
    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public DateTimeImmutable $minimum;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public DateTimeImmutable $maximum;
}
