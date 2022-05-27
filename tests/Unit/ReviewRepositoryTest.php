<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\ReviewRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ReviewRepositoryTest extends ApiTestCase
{
    protected ReviewRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new ReviewRepository($this->client);
    }

    public function test_get_review(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('review/5d63da037f6c8d03acedc04b'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('reviews/details')));
        $response = $this->repository->getReview('5d63da037f6c8d03acedc04b');
        $this->assertSame('Blade Runner 2049', $response->media_title);
    }
}
