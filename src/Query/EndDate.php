<?php

namespace Chiiya\Tmdb\Query;

class EndDate implements QueryParameterInterface
{
    use HandlesDates;

    public function __construct(mixed $date)
    {
        $this->date = $this->parseDate($date);
    }

    public function getKey(): string
    {
        return 'end_date';
    }
}
