<?php

namespace Chiiya\Tmdb\Query;

use DateTimeInterface;

trait HandlesDates
{
    protected string $date;

    public function getValue(): string
    {
        return $this->date;
    }

    protected function parseDate(mixed $date): string
    {
        if ($date instanceof DateTimeInterface) {
            return $date->format('Y-m-d');
        }

        return (string) $date;
    }
}
