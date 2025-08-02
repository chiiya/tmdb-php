<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use DateTimeImmutable;

abstract class AbstractEpisode extends DataTransferObject
{
    public function __construct(
        public int $id,
        public int $episode_number,
        public int $season_number,
        public int $vote_count,
        #[Cast(DateTimeCaster::class)]
        public ?DateTimeImmutable $air_date = null,
        #[Map(from: 'first_air_date')]
        #[Cast(ReleaseYearCaster::class)]
        public ?int $release_year = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $name = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $production_code = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $still_path = null,
        #[Cast(NullableFloatCaster::class)]
        public ?float $vote_average = null,
    ) {}
}
