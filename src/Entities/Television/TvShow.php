<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;

class TvShow extends DataTransferObject
{
    use HasMediaAttributes;
    use HasTvAttributes;
    public array $genre_ids;
}
