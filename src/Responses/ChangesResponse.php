<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\ChangedEntity;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ChangesResponse extends DataTransferObject
{
    use HasPagination;

    /** @var ChangedEntity[] */
    #[CastWith(ArrayCaster::class, ChangedEntity::class)]
    public array $results;
}
