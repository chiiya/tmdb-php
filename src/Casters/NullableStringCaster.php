<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;

class NullableStringCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }

    public function serialize(mixed $value)
    {
        return $value;
    }
}
