<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Spatie\DataTransferObject\Caster;

class NullableFloatCaster implements Caster
{
    public function cast(mixed $value): ?float
    {
        if ($value === null) {
            return null;
        }

        return (float) $value;
    }
}
