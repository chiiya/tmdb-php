<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CollectionRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Group;

class CollectionRepositoryTest extends ApiTestCase
{
    protected CollectionRepository $repository;

    #[Group('collections')]
    public function test_get_collection(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/details')));
        $response = $this->repository->getCollection(10);
        $this->assertSame('Star Wars Collection', $response->name);
        $this->assertSame('The Empire Strikes Back', $response->parts[1]->title);
    }

    #[Group('collections')]
    public function test_get_collection_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10?append_to_response=images,translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/appends')));
        $response = $this->repository->getCollection(10, [
            new AppendToResponse([AppendToResponse::IMAGES, AppendToResponse::TRANSLATIONS]),
        ]);
        $this->assertSame('Star Wars Collection', $response->name);
        $this->assertSame('The Empire Strikes Back', $response->parts[1]->title);
        $this->assertSame('/d8duYyyC9J5T825Hg7grmaabfxQ.jpg', $response->backdrops[0]->file_path);
        $this->assertSame('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $response->posters[0]->file_path);
        $this->assertSame('Star Wars Filmreihe', $response->translations[0]->data->title);
    }

    #[Group('collections')]
    public function test_collection_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/images')));
        $images = $this->repository->getImages(10);
        $this->assertSame('/d8duYyyC9J5T825Hg7grmaabfxQ.jpg', $images->backdrops[0]->file_path);
        $this->assertSame('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $images->posters[0]->file_path);
    }

    #[Group('collections')]
    public function test_collection_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/translations')));
        $translations = $this->repository->getTranslations(10);
        $this->assertSame('Star Wars Filmreihe', $translations[0]->data->title);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new CollectionRepository($this->client);
    }
}
