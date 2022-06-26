<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;

class Language extends DataTransferObject
{
    #[MapFrom('iso_639_1')]
    public string $language;
    public string $english_name;
    public string $name;
}
