<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Chiiya\Tmdb\Repositories\SearchRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class SearchRepositoryTest extends ApiTestCase
{
    protected SearchRepository $repository;

    public function test_search_companies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/company?query=Netflix'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/companies')));
        $response = $this->repository->searchCompanies('Netflix');
        $this->assertSame('Netflix Animation', $response->results[0]->name);
    }

    public function test_search_collections(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/collection?query=One%20Piece'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/collections')));
        $response = $this->repository->searchCollections('One Piece');
        $this->assertSame('One Piece Collection', $response->results[0]->name);
    }

    public function test_search_keywords(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/keyword?query=alien'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/keywords')));
        $response = $this->repository->searchKeywords('alien');
        $this->assertSame('alien', $response->results[0]->name);
    }

    public function test_search_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/movie?query=matrix'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/movies')));
        $response = $this->repository->searchMovies('matrix');
        $this->assertSame('The Matrix Resurrections', $response->results[0]->title);
    }

    public function test_search_people(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/person?query=Keanu'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/people')));
        $response = $this->repository->searchPeople('Keanu');
        $this->assertSame('Keanu Reeves', $response->results[0]->name);
    }

    public function test_search_tv(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/tv?query=Attack%20on%20Titan'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/tv')));
        $response = $this->repository->searchTv('Attack on Titan');
        $this->assertSame('Attack on Titan', $response->results[0]->name);
    }

    public function test_search_combined(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('search/multi?query=Attack%20on%20Titan'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('search/combined')));
        $response = $this->repository->searchCombined('Attack on Titan');
        $this->assertInstanceOf(Movie::class, $response->results[0]);
        $this->assertInstanceOf(TvShow::class, $response->results[4]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new SearchRepository($this->client);
    }
}
