<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Search;

use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Collections\HasCollectionAttributes;

class CollectionResult extends DataTransferObject
{
    use HasCollectionAttributes;
    public bool $adult;
    public string $original_language;
    public string $original_name;
}
