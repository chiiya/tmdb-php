<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Spatie\DataTransferObject\Caster;

class NullableStringCaster implements Caster
{
    public function cast(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
