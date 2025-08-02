<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\DataTransferObject;

class Keyword extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}
