<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;

abstract class AbstractPerson extends DataTransferObject
{
    public function __construct(
        public ?bool $adult = null,
        public ?int $gender = null,
        public ?string $known_for_department = null,
        public ?string $name = null,
        #[Cast(NullableFloatCaster::class)]
        public ?float $popularity = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $profile_path = null,
    ) {}

    public function isMale(): bool
    {
        return $this->gender === 2;
    }

    public function isFemale(): bool
    {
        return $this->gender === 1;
    }

    public function isUnknownGender(): bool
    {
        return $this->gender === 0;
    }
}
