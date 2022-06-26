<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Chiiya\Tmdb\Common\DataTransferObject;

class Job extends DataTransferObject
{
    public string $department;
    public array $jobs;
}
