<?php

namespace Chiiya\Tmdb\Entities\Configuration;

use Spatie\DataTransferObject\DataTransferObject;

class Configuration extends DataTransferObject
{
    public ImageConfiguration $images;
    public array $change_keys;
}
