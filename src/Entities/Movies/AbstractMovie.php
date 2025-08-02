<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Entities\Common\Media;
use DateTimeImmutable;

abstract class AbstractMovie extends Media
{
    public function __construct(
        public bool $adult,
        public string $original_title,
        public string $title,
        public bool $video,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $release_date,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
