<?php

namespace Chiiya\Tmdb\Query;

interface QueryParameterInterface
{
    public function getKey(): string;
    public function getValue(): string;
}
