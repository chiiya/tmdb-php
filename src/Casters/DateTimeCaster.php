<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use DateTimeImmutable;
use Exception;
use Spatie\DataTransferObject\Caster;

class DateTimeCaster implements Caster
{
    public function __construct(
        protected array $types,
        private ?string $format = null,
    ) {}

    public function cast(mixed $value): ?DateTimeImmutable
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($this->format === null) {
            try {
                return new DateTimeImmutable($value);
            } catch (Exception) {
                return null;
            }
        }

        if (! ($date = DateTimeImmutable::createFromFormat($this->format, $value))) {
            return null;
        }

        return $date;
    }
}
