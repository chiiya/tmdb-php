<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\WatchProviderRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class WatchProviderRepositoryTest extends ApiTestCase
{
    protected WatchProviderRepository $repository;

    public function test_available_regions(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('watch/providers/regions'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('watch_providers/available_regions')));
        $response = $this->repository->getAvailableRegions();
        $this->assertSame('United Arab Emirates', $response[0]->english_name);
    }

    public function test_movie_providers(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('watch/providers/movie'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('watch_providers/movies')));
        $response = $this->repository->getMovieProviders();
        $this->assertSame('Netflix', $response[0]->provider_name);
    }

    public function test_tv_providers(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('watch/providers/tv'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('watch_providers/tv')));
        $response = $this->repository->getTvProviders();
        $this->assertSame('Netflix', $response[0]->provider_name);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new WatchProviderRepository($this->client);
    }
}
