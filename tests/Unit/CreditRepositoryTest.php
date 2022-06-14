<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Credits\TvCredit;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Repositories\CreditRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CreditRepositoryTest extends ApiTestCase
{
    protected CreditRepository $repository;

    public function test_movie_credit(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('credit/52fe425bc3a36847f80181c1'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/credit_movie')));
        $response = $this->repository->getCredit('52fe425bc3a36847f80181c1');
        $this->assertInstanceOf(Movie::class, $response->media);
        $this->assertSame('The Matrix', $response->media->title);
        $this->assertSame('Keanu Reeves', $response->person->name);
    }

    public function test_tv_credit(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('credit/58c7134792514179d20011a9'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('misc/credit_tv')));
        $response = $this->repository->getCredit('58c7134792514179d20011a9');
        $this->assertInstanceOf(TvCredit::class, $response->media);
        $this->assertSame('Game of Thrones', $response->media->name);
        $this->assertSame('Season 1', $response->media->seasons[0]->name);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new CreditRepository($this->client);
    }
}
