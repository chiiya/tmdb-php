<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class Change extends DataTransferObject
{
    public function __construct(
        public string $key,
        /** @var ChangeItem[] */
        #[Cast(ArrayCaster::class, itemType: ChangeItem::class)]
        public array $items = [],
    ) {}
}
