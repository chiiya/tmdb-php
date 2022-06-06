<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Spatie\DataTransferObject\DataTransferObject;

class CrewJob extends DataTransferObject
{
    public string $credit_id;
    public string $job;
}
