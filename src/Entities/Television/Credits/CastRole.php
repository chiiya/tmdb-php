<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\DataTransferObject;

class CastRole extends DataTransferObject
{
    public function __construct(
        public string $credit_id,
        public string $character,
        public int $episode_count,
    ) {}
}
