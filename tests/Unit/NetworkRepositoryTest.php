<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\NetworkRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class NetworkRepositoryTest extends ApiTestCase
{
    protected NetworkRepository $repository;

    public function test_get_network(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/details')));
        $response = $this->repository->getNetwork(1);
        $this->assertSame('Fuji TV', $response->name);
    }

    public function test_get_network_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1?append_to_response=images,alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/appends')));
        $response = $this->repository->getNetwork(1, [
            new AppendToResponse([AppendToResponse::IMAGES, AppendToResponse::ALTERNATIVE_NAMES]),
        ]);
        $this->assertSame('Fuji TV', $response->name);
        $this->assertSame('/yS5UJjsSdZXML0YikWTYYHLPKhQ.png', $response->logos[0]->file_path);
        $this->assertSame('Fuji Television', $response->alternative_names[0]->name);
    }

    public function test_network_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/images')));
        $response = $this->repository->getImages(1);
        $this->assertSame('/yS5UJjsSdZXML0YikWTYYHLPKhQ.png', $response[0]->file_path);
    }

    public function test_network_alternative_names(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1/alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/alternative_names')));
        $response = $this->repository->getAlternativeNames(1);
        $this->assertSame('Fuji Television', $response[0]->name);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new NetworkRepository($this->client);
    }
}
