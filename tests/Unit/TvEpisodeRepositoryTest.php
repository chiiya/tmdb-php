<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\TvEpisodeRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class TvEpisodeRepositoryTest extends ApiTestCase
{
    protected TvEpisodeRepository $repository;

    public function test_episode_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/details')));
        $response = $this->repository->getEpisode(1399, 1, 2);
        $this->assertSame('The Kingsroad', $response->name);
        $this->assertSame('2011-04-24', $response->air_date->format('Y-m-d'));
        $this->assertSame('Director', $response->crew[0]->job);
    }

    public function test_episode_details_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint(
                $this->url(
                    'tv/1399/season/1/episode/2?append_to_response=credits,external_ids,images,translations,videos',
                ),
                'GET',
            )
            ->will(new Response(200, [], $this->getMockResponse('episodes/appends')));
        $response = $this->repository->getEpisode(1399, 1, 2, [
            new AppendToResponse([
                AppendToResponse::CREDITS,
                AppendToResponse::EXTERNAL_IDS,
                AppendToResponse::IMAGES,
                AppendToResponse::TRANSLATIONS,
                AppendToResponse::VIDEOS,
            ]),
        ]);
        $this->assertSame('The Kingsroad', $response->name);
        $this->assertSame('Sean Bean', $response->credits->cast[0]->name);
        $this->assertSame('tt1668746', $response->external_ids->imdb_id);
        $this->assertSame('/icjOgl5F9DhysOEo6Six2Qfwcu2.jpg', $response->stills[0]->file_path);
        $this->assertSame('Kongevejen', $response->translations[0]->data->name);
        $this->assertSame('YouTube', $response->videos[0]->site);
    }

    public function test_episode_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/episode/3661893/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/changes')));
        $response = $this->repository->getChanges(3661893);
        $this->assertSame('name', $response[0]->key);
        $this->assertSame('Le trésor de Saint-Castin: légende ou réalité?', $response[0]->items[0]->value);
    }

    public function test_episode_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2/credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/credits')));
        $response = $this->repository->getCredits(1399, 1, 2);
        $this->assertSame('Sean Bean', $response->cast[0]->name);
        $this->assertSame('Timothy Van Patten', $response->crew[0]->name);
        $this->assertSame('Sarita Piotrowski', $response->guest_stars[0]->name);
    }

    public function test_episode_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/external_ids')));
        $response = $this->repository->getExternalIds(1399, 1, 2);
        $this->assertSame('tt1668746', $response->imdb_id);
    }

    public function test_episode_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/images')));
        $response = $this->repository->getImages(1399, 1, 2);
        $this->assertSame('/icjOgl5F9DhysOEo6Six2Qfwcu2.jpg', $response[0]->file_path);
    }

    public function test_episode_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/translations')));
        $response = $this->repository->getTranslations(1399, 1, 2);
        $this->assertSame('Der Königsweg', $response[1]->data->name);
    }

    public function test_episode_videos(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/season/1/episode/2/videos'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/videos')));
        $response = $this->repository->getVideos(1399, 1, 2);
        $this->assertSame('YouTube', $response[0]->site);
        $this->assertSame('kPrW3Swrp4E', $response[0]->key);
        $this->assertSame('Clip', $response[0]->type);
    }

    public function test_episode_group_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/episode_group/60671140ebb99d002ad9e426'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('episodes/episode_group_details')));
        $response = $this->repository->getEpisodeGroup('60671140ebb99d002ad9e426');
        $this->assertSame('Episodes grouped by Seasons on Netflix.', $response->description);
        $this->assertSame('1999-10-20', $response->groups[0]->episodes[0]->air_date->format('Y-m-d'));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new TvEpisodeRepository($this->client);
    }
}
