<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Spatie\DataTransferObject\Attributes\MapFrom;

trait HasTranslationAttributes
{
    #[MapFrom('iso_3166_1')]
    public string $country;

    #[MapFrom('iso_639_1')]
    public string $language;
    public string $name;
    public string $english_name;
}
