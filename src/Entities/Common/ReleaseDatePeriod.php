<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use DateTimeImmutable;

class ReleaseDatePeriod extends DataTransferObject
{
    public function __construct(
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public DateTimeImmutable $minimum,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public DateTimeImmutable $maximum,
    ) {}
}
