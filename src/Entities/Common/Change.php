<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Change extends DataTransferObject
{
    public string $key;

    /** @var ChangeItem[] */
    #[CastWith(ArrayCaster::class, ChangeItem::class)]
    public array $items;
}
