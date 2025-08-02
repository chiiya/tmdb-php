<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use DateTimeImmutable;

class TvSeason extends DataTransferObject
{
    public function __construct(
        public int $id,
        public int $season_number,
        public ?int $episode_count = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $poster_path = null,
        #[Cast(DateTimeCaster::class)]
        public ?DateTimeImmutable $air_date = null,
        #[Map(from: 'air_date')]
        #[Cast(ReleaseYearCaster::class)]
        public ?int $release_year = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $name = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
    ) {}
}
