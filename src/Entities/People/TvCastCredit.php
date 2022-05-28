<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Television\HasTvAttributes;
use Spatie\DataTransferObject\DataTransferObject;

class TvCastCredit extends DataTransferObject
{
    use HasCastAttributes;
    use HasMediaAttributes;
    use HasTvAttributes;
    public int $episode_count;
    public array $genre_ids;
}
