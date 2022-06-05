<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Language extends DataTransferObject
{
    #[MapFrom('iso_639_1')]
    public string $language;
    public string $english_name;
    public string $name;
}
