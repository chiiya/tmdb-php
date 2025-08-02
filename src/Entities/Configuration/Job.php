<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Antwerpes\DataTransferObject\DataTransferObject;

class Job extends DataTransferObject
{
    public function __construct(
        public string $department,
        public array $jobs,
    ) {}
}
