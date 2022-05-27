<?php

namespace Chiiya\Tmdb\Entities\Common;

use Spatie\DataTransferObject\DataTransferObject;

class AlternativeName extends DataTransferObject
{
    public string $name;
    public string $type;
}
