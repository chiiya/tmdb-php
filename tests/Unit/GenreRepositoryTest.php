<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\GenreRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class GenreRepositoryTest extends ApiTestCase
{
    protected GenreRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new GenreRepository($this->client);
    }

    public function test_movie_genres(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('genre/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('genres/movies')));
        $response = $this->repository->getMovieGenres();
        $this->assertSame('Action', $response[0]->name);
    }

    public function test_tv_genres(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('genre/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('genres/tv')));
        $response = $this->repository->getTvGenres();
        $this->assertSame('Action & Adventure', $response[0]->name);
    }
}
