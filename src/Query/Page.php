<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class Page implements QueryParameterInterface
{
    public function __construct(
        protected string|int $page,
    ) {}

    public function getKey(): string
    {
        return 'page';
    }

    public function getValue(): string
    {
        return (string) $this->page;
    }
}
