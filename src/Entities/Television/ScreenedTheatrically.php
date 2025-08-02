<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;

class ScreenedTheatrically extends DataTransferObject
{
    public function __construct(
        #[Map(from: 'id')]
        public int $episode_id,
        public int $episode_number,
        public int $season_number,
    ) {}
}
