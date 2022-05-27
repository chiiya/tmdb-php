<?php

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\KeywordRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class KeywordRepositoryTest extends ApiTestCase
{
    protected KeywordRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new KeywordRepository($this->client);
    }

    public function test_get_keyword()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('keyword/378'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('keywords/details')));
        $response = $this->repository->getKeyword(378);
        $this->assertEquals('prison', $response->name);
    }

    public function test_get_keyword_movies()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('keyword/378/movies'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('keywords/movies')));
        $response = $this->repository->getMovies(378);
        $this->assertEquals('The Exorcism of God', $response->results[0]->title);
    }
}
