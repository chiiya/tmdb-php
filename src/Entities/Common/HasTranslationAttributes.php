<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Spatie\DataTransferObject\Attributes\MapFrom;

trait HasTranslationAttributes
{
    #[MapFrom('iso_3166_1')]
    public string $iso31661;

    #[MapFrom('iso_639_1')]
    public string $iso6391;
    public string $name;
    public string $english_name;
}
