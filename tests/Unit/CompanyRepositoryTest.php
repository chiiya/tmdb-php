<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CompanyRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CompanyRepositoryTest extends ApiTestCase
{
    protected CompanyRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new CompanyRepository($this->client);
    }

    public function test_get_company(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/details')));
        $response = $this->repository->getCompany(3268);
        $this->assertSame('HBO', $response->name);
    }

    public function test_get_company_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268?append_to_response=images,alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/appends')));
        $response = $this->repository->getCompany(3268, [
            new AppendToResponse([AppendToResponse::IMAGES, AppendToResponse::ALTERNATIVE_NAMES]),
        ]);
        $this->assertSame('HBO', $response->name);
        $this->assertSame('/tuomPhY2UtuPTqqFnKMVHvSb724.png', $response->logos[0]->file_path);
        $this->assertSame('Home Box Office', $response->alternative_names[0]->name);
    }

    public function test_company_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/images')));
        $response = $this->repository->getImages(3268);
        $this->assertSame('/tuomPhY2UtuPTqqFnKMVHvSb724.png', $response[0]->file_path);
    }

    public function test_company_alternative_names(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268/alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/alternative_names')));
        $response = $this->repository->getAlternativeNames(3268);
        $this->assertSame('Home Box Office', $response[0]->name);
    }
}
