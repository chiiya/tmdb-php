<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class IncludeAdult implements QueryParameterInterface
{
    public function __construct(
        protected bool $includeAdult = true,
    ) {}

    public function getKey(): string
    {
        return 'include_adult';
    }

    public function getValue(): string
    {
        return $this->includeAdult ? 'true' : 'false';
    }
}
