<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Casters\NullableFloatCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasPersonAttributes
{
    public ?bool $adult;
    public ?int $gender;
    public ?string $known_for_department;
    public ?string $name;

    #[CastWith(NullableFloatCaster::class)]
    public ?float $popularity;

    #[CastWith(NullableStringCaster::class)]
    public ?string $profile_path;

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
