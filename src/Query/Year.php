<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class Year implements QueryParameterInterface
{
    use HandlesDates;
    protected static string $format = 'Y';

    public function __construct(mixed $date)
    {
        $this->date = $this->parseDate($date);
    }

    public function getKey(): string
    {
        return 'year';
    }
}
