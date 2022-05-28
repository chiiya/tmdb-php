<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\MovieCastCredit;
use Chiiya\Tmdb\Entities\People\MovieCrewCredit;
use Chiiya\Tmdb\Entities\People\TvCastCredit;
use Chiiya\Tmdb\Entities\People\TvCrewCredit;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\PersonRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class PersonRepositoryTest extends ApiTestCase
{
    protected PersonRepository $repository;

    public function test_get_person(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/details')));
        $response = $this->repository->getPerson(287);
        $this->assertSame('Brad Pitt', $response->name);
        $this->assertSame('1963-12-18', $response->birthday->format('Y-m-d'));
        $this->assertTrue($response->isMale());
        $this->assertFalse($response->isFemale());
        $this->assertFalse($response->isUnknownGender());
    }

    public function test_get_person_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint(
                $this->url(
                    'person/287?append_to_response=movie_credits,tv_credits,combined_credits,external_ids,tagged_images,images,changes,translations',
                ),
                'GET',
            )
            ->will(new Response(200, [], $this->getMockResponse('people/appends')));
        $response = $this->repository->getPerson(287, [
            new AppendToResponse([
                AppendToResponse::MOVIE_CREDITS,
                AppendToResponse::TV_CREDITS,
                AppendToResponse::COMBINED_CREDITS,
                AppendToResponse::EXTERNAL_IDS,
                AppendToResponse::TAGGED_IMAGES,
                AppendToResponse::IMAGES,
                AppendToResponse::CHANGES,
                AppendToResponse::TRANSLATIONS,
            ]),
        ]);
        $this->assertSame('Brad Pitt', $response->name);
        $this->assertSame('Meet Joe Black', $response->movie_credits->cast[0]->title);
        $this->assertSame('Meet Joe Black', $response->combined_credits->cast[0]->title);
        $this->assertSame('Growing Pains', $response->tv_credits->cast[0]->name);
        $this->assertSame('nm0000093', $response->external_ids->imdb_id);
        $this->assertSame('Killing Them Softly', $response->tagged_images->results[0]->media->title);
        $this->assertSame('/oAvLuGuTaNcjY3R5huBQdfrZN6j.jpg', $response->profiles[0]->file_path);
        $this->assertSame('gender', $response->changes[0]->key);
        $this->assertStringStartsWith('William Bradley Pitt', $response->translations[0]->data->biography);
    }

    public function test_person_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/1378658/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/changes')));
        $response = $this->repository->getChanges(1378658);
        $this->assertSame('gender', $response[0]->key);
        $this->assertSame(2, $response[0]->items[0]->value);
        $this->assertSame(0, $response[0]->items[0]->original_value);
        $this->assertSame('updated', $response[0]->items[0]->action);
        $this->assertSame('images', $response[1]->key);
        $this->assertSame('/9mIRFnPxglc6oa2JiaoRsr5IgLw.jpg', $response[1]->items[0]->value['profile']['file_path']);
        $this->assertSame('added', $response[1]->items[0]->action);
    }

    public function test_person_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/images')));
        $response = $this->repository->getImages(287);
        $this->assertInstanceOf(ProfileImage::class, $response[0]);
        $this->assertSame('/oAvLuGuTaNcjY3R5huBQdfrZN6j.jpg', $response[0]->file_path);
    }

    public function test_movie_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/movie_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/movie_credits')));
        $response = $this->repository->getMovieCredits(287);
        $this->assertInstanceOf(MovieCastCredit::class, $response->cast[0]);
        $this->assertSame('Meet Joe Black', $response->cast[0]->title);
        $this->assertInstanceOf(MovieCrewCredit::class, $response->crew[1]);
        $this->assertSame('House of Time', $response->crew[1]->title);
    }

    public function test_tv_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/tv_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/tv_credits')));
        $response = $this->repository->getTvCredits(287);
        $this->assertInstanceOf(TvCastCredit::class, $response->cast[0]);
        $this->assertSame('Growing Pains', $response->cast[0]->name);
        $this->assertInstanceOf(TvCrewCredit::class, $response->crew[0]);
        $this->assertSame('FEUD', $response->crew[0]->name);
    }

    public function test_combined_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/combined_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/combined_credits')));
        $response = $this->repository->getCombinedCredits(287);
        $this->assertInstanceOf(MovieCastCredit::class, $response->cast[0]);
        $this->assertSame('Meet Joe Black', $response->cast[0]->title);
        $this->assertInstanceOf(TvCastCredit::class, $response->cast[1]);
        $this->assertSame('Growing Pains', $response->cast[1]->name);
        $this->assertInstanceOf(MovieCrewCredit::class, $response->crew[0]);
        $this->assertSame('Notes on an American Film Director at Work', $response->crew[0]->title);
        $this->assertInstanceOf(TvCrewCredit::class, $response->crew[1]);
        $this->assertSame('FEUD', $response->crew[1]->name);
    }

    public function test_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/external_ids')));
        $response = $this->repository->getExternalIds(287);
        $this->assertSame('nm0000093', $response->imdb_id);
    }

    public function test_tagged_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/31/tagged_images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/tagged_images')));
        $response = $this->repository->getTaggedImages(31);
        $this->assertInstanceOf(PosterImage::class, $response->results[0]);
        $this->assertInstanceOf(Movie::class, $response->results[0]->media);
        $this->assertSame('A League of Their Own', $response->results[0]->media->title);
        $this->assertSame('/7xpFXAOjgzFPE3vyVerFGfrXhFK.jpg', $response->results[0]->file_path);
    }

    public function test_person_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/translations')));
        $response = $this->repository->getTranslations(287);
        $this->assertStringStartsWith('William Bradley Pitt', $response[0]->data->biography);
    }

    public function test_person_latest(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/latest'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/latest')));
        $response = $this->repository->getLatest();
        $this->assertSame('Deborah Gates', $response->name);
    }

    public function test_person_popular(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/popular'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/popular')));
        $response = $this->repository->getPopular();
        $this->assertSame(500, $response->total_pages);
        $this->assertSame('Austin Butler', $response->results[0]->name);
        $this->assertInstanceOf(Movie::class, $response->results[0]->known_for[0]);
        $this->assertSame('Blade Runner 2049', $response->results[0]->known_for[0]->title);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new PersonRepository($this->client);
    }
}
