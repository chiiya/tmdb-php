<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use DateTimeImmutable;
use Exception;

class DateTimeCaster implements CastsProperty
{
    public function __construct(
        protected array $types,
        private ?string $format = null,
    ) {}

    public function unserialize(mixed $value): ?DateTimeImmutable
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

    public function serialize(mixed $value)
    {
        if ($value instanceof DateTimeImmutable) {
            return $value->format($this->format ?? 'Y-m-d H:i:s');
        }

        return $value;
    }
}
