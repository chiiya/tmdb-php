<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Companies\Company;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CompanyListResponse extends DataTransferObject
{
    use HasPagination;

    /** @var array<int, Company> */
    #[CastWith(ArrayCaster::class, Company::class)]
    public array $results;
}
