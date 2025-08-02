<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Certifications;

use Antwerpes\DataTransferObject\DataTransferObject;

class Certification extends DataTransferObject
{
    public function __construct(
        public string $certification,
        public string $meaning,
        public int $order,
    ) {}
}
