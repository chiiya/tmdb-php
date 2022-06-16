<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use DateTimeImmutable;
use Exception;
use Spatie\DataTransferObject\Caster;

class ReleaseYearCaster implements Caster
{
    public function cast(mixed $value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($value instanceof DateTimeImmutable) {
            return (int) $value->format('Y');
        }

        try {
            $date = new DateTimeImmutable($value);
        } catch (Exception) {
            return null;
        }

        return (int) $date->format('Y');
    }
}
