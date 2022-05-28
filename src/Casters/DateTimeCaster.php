<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use DateTimeImmutable;
use Spatie\DataTransferObject\Caster;

class DateTimeCaster implements Caster
{
    public function __construct(
        protected array $types,
        private string $format,
    ) {}

    public function cast(mixed $value): ?DateTimeImmutable
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (! ($date = DateTimeImmutable::createFromFormat($this->format, $value))) {
            return null;
        }

        return $date;
    }
}
