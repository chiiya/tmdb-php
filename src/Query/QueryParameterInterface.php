<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

interface QueryParameterInterface
{
    public function getKey(): string;

    public function getValue(): string;
}
