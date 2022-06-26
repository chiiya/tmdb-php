<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\People\Person;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class PersonListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Person> */
    #[CastWith(ArrayCaster::class, Person::class)]
    public array $results;
}
