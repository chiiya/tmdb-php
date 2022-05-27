<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Spatie\DataTransferObject\DataTransferObject;

class Job extends DataTransferObject
{
    public string $department;
    public array $jobs;
}
