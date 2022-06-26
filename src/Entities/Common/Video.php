<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class Video extends DataTransferObject
{
    #[MapFrom('iso_639_1')]
    public string $language;

    #[MapFrom('iso_3166_1')]
    public string $country;
    public string $name;
    public string $key;
    public string $site;
    public int $size;
    public string $type;
    public bool $official;

    #[CastWith(DateTimeCaster::class)]
    public DateTimeImmutable $published_at;
    public string $id;
}
