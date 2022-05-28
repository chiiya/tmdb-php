<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class TvShow extends DataTransferObject
{
    use HasMediaAttributes;
    use HasTvAttributes;
    public array $genre_ids;
}
