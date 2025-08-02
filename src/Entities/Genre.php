<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities;

use Antwerpes\DataTransferObject\DataTransferObject;

class Genre extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}
