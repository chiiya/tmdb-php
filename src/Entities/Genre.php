<?php

namespace Chiiya\Tmdb\Entities;

use Spatie\DataTransferObject\DataTransferObject;

class Genre extends DataTransferObject
{
    public int $id;
    public string $name;
}
