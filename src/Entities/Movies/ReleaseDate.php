<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ReleaseDate extends DataTransferObject
{
    #[CastWith(NullableStringCaster::class)]
    public ?string $certification;

    #[CastWith(NullableStringCaster::class)]
    #[MapFrom('iso_639_1')]
    public ?string $language;

    #[CastWith(NullableStringCaster::class)]
    public ?string $note;

    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $release_date;
    public ?int $type;
}
