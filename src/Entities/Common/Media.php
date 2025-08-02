<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;

abstract class Media extends DataTransferObject
{
    public function __construct(
        public int $id,
        public int $vote_count,
        public string $original_language,
        #[Cast(NullableStringCaster::class)]
        public ?string $backdrop_path = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $overview = null,
        #[Cast(NullableFloatCaster::class)]
        public ?float $popularity = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $poster_path = null,
        #[Cast(NullableFloatCaster::class)]
        public ?float $vote_average = null,
    ) {}
}
