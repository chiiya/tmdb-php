<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\Keyword;

class KeywordListResponse extends PaginatedResponse
{
    public function __construct(
        /** @var array<int, Keyword> */
        #[Cast(ArrayCaster::class, Keyword::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
