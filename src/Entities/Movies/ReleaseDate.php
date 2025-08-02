<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use DateTimeImmutable;

class ReleaseDate extends DataTransferObject
{
    public function __construct(
        #[Cast(NullableStringCaster::class)]
        public ?string $certification = null,
        #[Cast(NullableStringCaster::class)]
        #[Map(from: 'iso_639_1')]
        public ?string $language = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $note = null,
        #[Cast(DateTimeCaster::class)]
        public ?DateTimeImmutable $release_date = null,
        public ?int $type = null,
    ) {}
}
