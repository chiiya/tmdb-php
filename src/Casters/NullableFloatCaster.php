<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;

class NullableFloatCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?float
    {
        if ($value === null) {
            return null;
        }

        return (float) $value;
    }

    public function serialize(mixed $value)
    {
        return $value;
    }
}
