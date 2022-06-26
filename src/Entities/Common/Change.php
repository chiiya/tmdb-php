<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class Change extends DataTransferObject
{
    public string $key;

    /** @var ChangeItem[] */
    #[CastWith(ArrayCaster::class, ChangeItem::class)]
    public array $items;
}
