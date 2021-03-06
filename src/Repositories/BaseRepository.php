<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Http\ClientInterface;

abstract class BaseRepository
{
    public function __construct(
        protected ClientInterface $client,
    ) {}
}
