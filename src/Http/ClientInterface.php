<?php

namespace Chiiya\Tmdb\Http;

use JsonSerializable;

interface ClientInterface
{
    public function get(string $url, array $parameters = []): array;

    public function post(string $url, JsonSerializable $data): array;

    public function put(string $url, JsonSerializable $data): array;
}
