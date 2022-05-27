<?php

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\ChangeRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ChangeRepositoryTest extends ApiTestCase
{
    protected ChangeRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ChangeRepository($this->client);
    }

    public function test_movie_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getMovieChanges();
        $this->assertEquals('186809', $response->results[0]->id);
    }

    public function test_tv_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getTvChanges();
        $this->assertEquals('186809', $response->results[0]->id);
    }

    public function test_person_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/changes')));
        $response = $this->repository->getPersonChanges();
        $this->assertEquals('186809', $response->results[0]->id);
    }
}
