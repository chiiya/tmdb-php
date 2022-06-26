<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\ChangedEntity;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ChangesResponse extends DataTransferObject
{
    use HasPagination;

    /** @var ChangedEntity[] */
    #[CastWith(ArrayCaster::class, ChangedEntity::class)]
    public array $results;
}
