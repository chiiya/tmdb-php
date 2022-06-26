<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Common\DataTransferObject;

class Keyword extends DataTransferObject
{
    public int $id;
    public string $name;
}
