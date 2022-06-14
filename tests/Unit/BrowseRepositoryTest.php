<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\Television\TvShow;
use Chiiya\Tmdb\Enumerators\MediaType;
use Chiiya\Tmdb\Enumerators\TimeWindow;
use Chiiya\Tmdb\Query\ExternalSource;
use Chiiya\Tmdb\Repositories\BrowseRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class BrowseRepositoryTest extends ApiTestCase
{
    protected BrowseRepository $repository;

    public function test_find_by_id(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('find/tt0133093?external_source=imdb_id'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/find_by_id')));
        $response = $this->repository->findByID('tt0133093', ExternalSource::IMDB);
        $this->assertSame('The Matrix', $response->movie_results[0]->title);
    }

    public function test_discover_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('discover/movie?with_genres=18&sort_by=vote_average.desc&vote_count.gte=100'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/discover_movies')));
        $response = $this->repository->discoverMovies([
            'with_genres' => 18,
            'sort_by' => 'vote_average.desc',
            'vote_count.gte' => 100,
        ]);
        $this->assertSame('The Shawshank Redemption', $response->results[0]->title);
    }

    public function test_discover_tv(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('discover/tv?with_genres=18&sort_by=vote_average.desc&vote_count.gte=100'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/discover_tv')));
        $response = $this->repository->discoverTV([
            'with_genres' => 18,
            'sort_by' => 'vote_average.desc',
            'vote_count.gte' => 100,
        ]);
        $this->assertSame('Arcane', $response->results[0]->name);
    }

    public function test_get_trending(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('trending/all/week'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/trending')));
        $response = $this->repository->getTrending(MediaType::ALL, TimeWindow::WEEK);
        $this->assertInstanceOf(TvShow::class, $response->results[0]);
        $this->assertSame('Stranger Things', $response->results[0]->name);
        $this->assertInstanceOf(Movie::class, $response->results[3]);
        $this->assertSame('Fantastic Beasts: The Secrets of Dumbledore', $response->results[3]->title);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new BrowseRepository($this->client);
    }
}
