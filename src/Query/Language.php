<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class Language implements QueryParameterInterface
{
    public function __construct(
        protected string $language = 'en-US',
    ) {}

    public function getKey(): string
    {
        return 'language';
    }

    public function getValue(): string
    {
        return $this->language;
    }
}
