<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ScreenedTheatrically extends DataTransferObject
{
    #[MapFrom('id')]
    public int $episode_id;
    public int $episode_number;
    public int $season_number;
}
