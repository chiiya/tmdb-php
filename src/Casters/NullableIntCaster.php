<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;

class NullableIntCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?int
    {
        if ($value === null) {
            return null;
        }

        return (int) $value;
    }

    public function serialize(mixed $value)
    {
        return $value;
    }
}
