<?php

namespace Chiiya\Tmdb\Entities\Movies;

use Spatie\DataTransferObject\DataTransferObject;

class RelatedCollection extends DataTransferObject
{
    public int $id;
    public string $name;
    public ?string $poster_path;
    public ?string $backdrop_path;
}
