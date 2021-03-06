<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\ChangeRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ChangeRepositoryTest extends ApiTestCase
{
    protected ChangeRepository $repository;

    public function test_movie_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getMovieChanges();
        $this->assertSame(186809, $response->results[0]->id);
    }

    public function test_tv_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getTvChanges();
        $this->assertSame(186809, $response->results[0]->id);
    }

    public function test_person_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getPersonChanges();
        $this->assertSame(186809, $response->results[0]->id);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new ChangeRepository($this->client);
    }
}
