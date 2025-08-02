<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\ChangedEntity;

class ChangesResponse extends PaginatedResponse
{
    public function __construct(
        /** @var ChangedEntity[] */
        #[Cast(ArrayCaster::class, ChangedEntity::class)]
        public array $results,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
