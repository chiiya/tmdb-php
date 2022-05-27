<?php

namespace Chiiya\Tmdb\Entities\Certifications;

use Spatie\DataTransferObject\DataTransferObject;

class Certification extends DataTransferObject
{
    public string $certification;
    public string $meaning;
    public int $order;
}
