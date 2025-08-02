<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities;

use Antwerpes\DataTransferObject\DataTransferObject;

class ChangedEntity extends DataTransferObject
{
    public function __construct(
        public ?int $id,
        public ?bool $adult,
    ) {}
}
