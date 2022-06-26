<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Chiiya\Tmdb\Common\DataTransferObject;

class CrewJob extends DataTransferObject
{
    public string $credit_id;
    public string $job;
}
