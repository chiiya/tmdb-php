<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\TvSeasonRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class TvSeasonRepositoryTest extends ApiTestCase
{
    protected TvSeasonRepository $repository;

    public function test_season_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/details')));
        $response = $this->repository->getTvSeason(1399, 1);
        $this->assertSame('2011-04-17', $response->air_date->format('Y-m-d'));
        $this->assertSame(1, $response->episodes[0]->episode_number);
        $this->assertSame('Season 1', $response->name);
    }

    public function test_season_details_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint(
                $this->url(
                    'tv/1399/season/1?append_to_response=aggregate_credits,credits,external_ids,images,translations,videos',
                ),
                'GET',
            )
            ->will(new Response(200, [], $this->getMockResponse('seasons/appends')));
        $response = $this->repository->getTvSeason(1399, 1, [
            new AppendToResponse([
                AppendToResponse::AGGREGATE_CREDITS,
                AppendToResponse::CREDITS,
                AppendToResponse::EXTERNAL_IDS,
                AppendToResponse::IMAGES,
                AppendToResponse::TRANSLATIONS,
                AppendToResponse::VIDEOS,
            ]),
        ]);
        $this->assertSame('2011-04-17', $response->air_date->format('Y-m-d'));
        $this->assertSame('Sean Bean', $response->aggregate_credits->cast[0]->name);
        $this->assertSame('Frank Doelger', $response->credits->crew[0]->name);
        $this->assertSame(364731, $response->external_ids->tvdb_id);
        $this->assertSame('/zwaj4egrhnXOBIit1tyb4Sbt3KP.jpg', $response->posters[0]->file_path);
        $this->assertSame('Danish', $response->translations[0]->english_name);
        $this->assertSame('Recap', $response->videos[0]->type);
    }

    public function test_season_aggregate_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/aggregate_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/aggregate_credits')));
        $response = $this->repository->getAggregateCredits(1399, 1);
        $this->assertSame('Sean Bean', $response->cast[0]->name);
        $this->assertSame(10, $response->cast[0]->total_episode_count);
        $this->assertSame('Ned Stark', $response->cast[0]->roles[0]->character);
        $this->assertSame('Richard Roberts', $response->crew[0]->name);
        $this->assertSame('Set Decoration', $response->crew[0]->jobs[0]->job);
        $this->assertSame(10, $response->crew[0]->total_episode_count);
    }

    public function test_season_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/season/43521/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/changes')));
        $response = $this->repository->getChanges(43521);
        $this->assertSame('images', $response[0]->key);
        $this->assertSame('/51cZWXDXAJNyBQl9Nf3ILwCPzdK.jpg', $response[0]->items[0]->value['poster']['file_path']);
    }

    public function test_season_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/credits')));
        $response = $this->repository->getCredits(1399, 1);
        $this->assertSame('Sean Bean', $response->cast[0]->name);
        $this->assertSame('Frank Doelger', $response->crew[0]->name);
    }

    public function test_season_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/external_ids')));
        $response = $this->repository->getExternalIds(1399, 1);
        $this->assertSame(364731, $response->tvdb_id);
    }

    public function test_season_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/images')));
        $response = $this->repository->getImages(1399, 1);
        $this->assertSame('/zwaj4egrhnXOBIit1tyb4Sbt3KP.jpg', $response[0]->file_path);
    }

    public function test_season_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/translations')));
        $response = $this->repository->getTranslations(1399, 1);
        $this->assertStringStartsWith('Dette nye storslåede', $response[0]->data->overview);
    }

    public function test_season_videos(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/videos'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('seasons/videos')));
        $response = $this->repository->getVideos(1399, 1);
        $this->assertSame('YouTube', $response[0]->site);
        $this->assertSame('e0Y8KpQpW8c', $response[0]->key);
        $this->assertSame('Recap', $response[0]->type);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new TvSeasonRepository($this->client);
    }
}
