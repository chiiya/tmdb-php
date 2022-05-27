<?php

namespace Chiiya\Tmdb\Entities\Companies;

use Spatie\DataTransferObject\DataTransferObject;

class Company extends DataTransferObject
{
    public int $id;
    public string $name;
    public ?string $logo_path;
    public string $origin_country;
}
