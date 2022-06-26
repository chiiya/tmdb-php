<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Chiiya\Tmdb\Common\DataTransferObject;

class CastRole extends DataTransferObject
{
    public string $credit_id;
    public string $character;
    public int $episode_count;
}
