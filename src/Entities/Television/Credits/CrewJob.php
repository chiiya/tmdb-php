<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\DataTransferObject;

class CrewJob extends DataTransferObject
{
    public function __construct(
        public string $credit_id,
        public string $job,
    ) {}
}
