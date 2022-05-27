<?php

namespace Chiiya\Tmdb\Entities\Collections;

use Spatie\DataTransferObject\DataTransferObject;

class TranslationData extends DataTransferObject
{
    public string $title;
    public string $overview;
    public string $homepage;
}
