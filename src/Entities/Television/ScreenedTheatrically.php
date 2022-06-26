<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ScreenedTheatrically extends DataTransferObject
{
    #[MapFrom('id')]
    public int $episode_id;
    public int $episode_number;
    public int $season_number;
}
