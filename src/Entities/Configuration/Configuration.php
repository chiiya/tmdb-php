<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Antwerpes\DataTransferObject\DataTransferObject;

class Configuration extends DataTransferObject
{
    public function __construct(
        public ImageConfiguration $images,
        public array $change_keys,
    ) {}
}
