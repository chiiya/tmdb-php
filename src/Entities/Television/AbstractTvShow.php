<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\ReleaseYearCaster;
use Chiiya\Tmdb\Entities\Common\Media;
use DateTimeImmutable;

abstract class AbstractTvShow extends Media
{
    public function __construct(
        public string $original_name,
        public array $origin_country,
        public string $name,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $first_air_date = null,
        #[Map(from: 'first_air_date')]
        #[Cast(ReleaseYearCaster::class)]
        public ?int $release_year = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
