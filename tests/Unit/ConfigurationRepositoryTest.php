<?php

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Repositories\ConfigurationRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ConfigurationRepositoryTest extends ApiTestCase
{
    protected ConfigurationRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ConfigurationRepository($this->client);
    }

    public function test_api_configuration()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/configuration')));
        $response = $this->repository->getApiConfiguration();
        $this->assertEquals('w300', $response->images->backdrop_sizes[0]);
    }

    public function test_countries(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/countries'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/countries')));
        $response = $this->repository->getCountries();
        $this->assertEquals('Andorra', $response[0]->english_name);
    }

    public function test_jobs(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/jobs'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/jobs')));
        $response = $this->repository->getJobs();
        $this->assertEquals('Special Effects', $response[0]->jobs[0]);
    }

    public function test_languages(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/languages'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/languages')));
        $response = $this->repository->getLanguages();
        $this->assertEquals('Aragonese', $response[0]->english_name);
    }

    public function test_primary_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/primary_translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/primary_translations')));
        $response = $this->repository->getPrimaryTranslations();
        $this->assertEquals('af-ZA', $response[0]);
    }

    public function test_timezones(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/timezones'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/timezones')));
        $response = $this->repository->getTimezones();
        $this->assertEquals('Europe/Andorra', $response[0]->zones[0]);
    }
}
