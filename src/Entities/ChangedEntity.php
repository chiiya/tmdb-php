<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities;

use Chiiya\Tmdb\Common\DataTransferObject;

class ChangedEntity extends DataTransferObject
{
    public int $id;
    public ?bool $adult;
}
