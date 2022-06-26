<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Chiiya\Tmdb\Common\DataTransferObject;

class Configuration extends DataTransferObject
{
    public ImageConfiguration $images;
    public array $change_keys;
}
