<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Entities\Common\Keyword;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class KeywordListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Keyword> */
    #[CastWith(ArrayCaster::class, Keyword::class)]
    public array $results;
}
