<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests;

use BlastCloud\Guzzler\UsesGuzzler;
use Chiiya\Tmdb\Http\Client;
use PHPUnit\Framework\TestCase;

abstract class ApiTestCase extends TestCase
{
    use UsesGuzzler;
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $client = $this->guzzler->getClient([
            'base_uri' => 'https://api.themoviedb.org/3/',
        ]);
        $this->client = new Client($client);
    }

    protected function url(string $path): string
    {
        return 'https://api.themoviedb.org/3/'.ltrim($path, '/');
    }

    protected function getMockResponse(string $path): string
    {
        return file_get_contents(__DIR__.'/responses/'.$path.'.json');
    }
}
