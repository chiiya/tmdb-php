<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Companies\Company;

class CompanyListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Company> */
        #[Cast(ArrayCaster::class, Company::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
