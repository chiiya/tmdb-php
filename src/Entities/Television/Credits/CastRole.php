<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Spatie\DataTransferObject\DataTransferObject;

class CastRole extends DataTransferObject
{
    public string $credit_id;
    public string $character;
    public int $episode_count;
}
