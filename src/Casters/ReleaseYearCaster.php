<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use DateTimeImmutable;
use Exception;

class ReleaseYearCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        try {
            $date = new DateTimeImmutable($value);
        } catch (Exception) {
            return null;
        }

        return (int) $date->format('Y');
    }

    public function serialize(mixed $value): ?int
    {
        if ($value === null) {
            return null;
        }

        return (int) $value;
    }
}
