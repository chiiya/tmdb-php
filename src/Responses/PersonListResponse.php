<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\People\Person;

class PersonListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Person> */
        #[Cast(ArrayCaster::class, Person::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
