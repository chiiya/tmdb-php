<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class Region implements QueryParameterInterface
{
    public function __construct(
        protected string $region = 'US',
    ) {}

    public function getKey(): string
    {
        return 'region';
    }

    public function getValue(): string
    {
        return $this->region;
    }
}
