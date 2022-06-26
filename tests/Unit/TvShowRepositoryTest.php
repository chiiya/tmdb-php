<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Television\TvShowDetails;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\TvShowRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class TvShowRepositoryTest extends ApiTestCase
{
    protected TvShowRepository $repository;

    /**
     * @group test
     */
    public function test_show_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/details')));
        $response = $this->repository->getTvShow(76479);
        $this->assertSame('Eric Kripke', $response->created_by[0]->name);
        $this->assertSame('Sci-Fi & Fantasy', $response->genres[0]->name);
        $this->assertSame('Glorious Five Year Plan', $response->last_episode_to_air->name);
        $this->assertSame('The Last Time to Look on this World of Lies', $response->next_episode_to_air->name);
        $this->assertSame('Amazon', $response->networks[0]->name);
        $this->assertSame('Amazon Studios', $response->production_companies[0]->name);
        $this->assertSame('United States of America', $response->production_countries[0]->name);
        $this->assertSame('Specials', $response->seasons[0]->name);
        $this->assertSame('English', $response->spoken_languages[0]->name);
        $this->assertSame('2019-07-25', $response->first_air_date->format('Y-m-d'));
        $this->assertSame(2019, $response->release_year);
    }

    public function test_get_show_with_appends(): void
    {
        $response = $this->requestAppendedRelations([
            AppendToResponse::AGGREGATE_CREDITS,
            AppendToResponse::ALTERNATIVE_TITLES,
            AppendToResponse::CHANGES,
            AppendToResponse::CONTENT_RATINGS,
            AppendToResponse::CREDITS,
        ], 'shows/appends-1');
        $this->assertSame('The Boys', $response->name);
        $this->assertSame('Karl Urban', $response->aggregate_credits->cast[0]->name);
        $this->assertSame('Arvinder Greywal', $response->aggregate_credits->crew[0]->name);
        $this->assertSame('Момчетата', $response->alternative_titles[0]->title);
        $this->assertSame('season', $response->changes[0]->key);
        $this->assertSame('TV-MA', $response->content_ratings[0]->rating);
        $this->assertSame('Karl Urban', $response->credits->cast[0]->name);
        $this->assertSame('Paul Grellong', $response->credits->crew[0]->name);

        $response = $this->requestAppendedRelations([
            AppendToResponse::EPISODE_GROUPS,
            AppendToResponse::EXTERNAL_IDS,
            AppendToResponse::IMAGES,
            AppendToResponse::KEYWORDS,
            AppendToResponse::RECOMMENDATIONS,
        ], 'shows/appends-2');
        $this->assertSame('tt1190634', $response->external_ids->imdb_id);
        $this->assertSame('/stiQsL31rO4uSksWWSUBU5EdKon.jpg', $response->images->backdrops[0]->file_path);
        $this->assertSame('superhero', $response->keywords[0]->name);
        $this->assertSame('The Mandalorian', $response->recommendations[0]->name);

        $response = $this->requestAppendedRelations([
            AppendToResponse::REVIEWS,
            AppendToResponse::SCREENED_THEATRICALLY,
            AppendToResponse::SIMILAR,
            AppendToResponse::TRANSLATIONS,
            AppendToResponse::VIDEOS,
            AppendToResponse::WATCH_PROVIDERS,
        ], 'shows/appends-3');
        $this->assertStringStartsWith('Wonderful premise, beautiful pictures', $response->reviews[0]->content);
        $this->assertSame('The Incredible Hulk', $response->similar[0]->name);
        $this->assertSame('Danish', $response->translations[0]->english_name);
        $this->assertSame('Trailer', $response->videos[0]->type);
        $this->assertSame('Amazon Prime Video', $response->watch_providers['US']->flatrate[0]->provider_name);
    }

    public function test_show_aggregate_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/aggregate_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/aggregate_credits')));
        $response = $this->repository->getAggregateCredits(76479);
        $this->assertSame('Karl Urban', $response->cast[0]->name);
        $this->assertSame('Arvinder Greywal', $response->crew[0]->name);
    }

    public function test_show_alternative_titles(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/alternative_titles'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/alternative_titles')));
        $response = $this->repository->getAlternativeTitles(76479);
        $this->assertSame('BG', $response[0]->country);
        $this->assertSame('Момчетата', $response[0]->title);
    }

    public function test_show_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/99161/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/changes')));
        $response = $this->repository->getChanges(99161);
        $this->assertSame('tvdb_id', $response[0]->key);
        $this->assertSame('375980', $response[0]->items[0]->value);
    }

    public function test_show_content_ratings(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/content_ratings'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/content_ratings')));
        $response = $this->repository->getContentRatings(76479);
        $this->assertSame('US', $response[0]->country);
        $this->assertSame('TV-MA', $response[0]->rating);
    }

    public function test_show_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/credits')));
        $response = $this->repository->getCredits(76479);
        $this->assertSame('Karl Urban', $response->cast[0]->name);
        $this->assertSame('Paul Grellong', $response->crew[0]->name);
    }

    public function test_show_episode_groups(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/37854/episode_groups'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/episode_groups')));
        $response = $this->repository->getEpisodeGroups(37854);
        $this->assertSame('Netflix Seasons', $response[1]->name);
        $this->assertSame('Netflix', $response[1]->network->name);
    }

    public function test_show_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/external_ids')));
        $response = $this->repository->getExternalIds(76479);
        $this->assertSame('tt1190634', $response->imdb_id);
    }

    public function test_show_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/images')));
        $response = $this->repository->getImages(76479);
        $this->assertSame('/stiQsL31rO4uSksWWSUBU5EdKon.jpg', $response->backdrops[0]->file_path);
        $this->assertSame('/5xR4n0PW6vDABfvHlN2l9UWKJgB.png', $response->logos[0]->file_path);
        $this->assertSame('/stTEycfG9928HYGEISBFaG1ngjM.jpg', $response->posters[0]->file_path);
    }

    public function test_show_keywords(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/keywords'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/keywords')));
        $response = $this->repository->getKeywords(76479);
        $this->assertSame('superhero', $response[0]->name);
    }

    public function test_show_recommendations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/recommendations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/recommendations')));
        $response = $this->repository->getRecommendations(76479);
        $this->assertSame('The Mandalorian', $response->results[0]->name);
    }

    public function test_show_reviews(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/1399/reviews'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/reviews')));
        $response = $this->repository->getReviews(1399);
        $this->assertStringStartsWith('I started watching when it came out', $response->results[0]->content);
        $this->assertSame('johndoe', $response->results[0]->author);
    }

    public function test_show_screened_theatrically(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/68716/screened_theatrically'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/screened_theatrically')));
        $response = $this->repository->getScreenedTheatrically(68716);
        $this->assertSame(1279700, $response[0]->episode_id);
    }

    public function test_show_similar(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/similar'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/similar')));
        $response = $this->repository->getSimilar(76479);
        $this->assertSame('The Incredible Hulk', $response->results[0]->name);
    }

    public function test_show_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/translations')));
        $response = $this->repository->getTranslations(76479);
        $this->assertSame('German', $response[1]->english_name);
        $this->assertStringStartsWith('Eine ehrfurchtslose Interpretation dessen', $response[1]->data->overview);
    }

    public function test_show_videos(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/videos'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/videos')));
        $response = $this->repository->getVideos(76479);
        $this->assertSame('YouTube', $response[0]->site);
        $this->assertSame('tcrNsIaQkb4', $response[0]->key);
        $this->assertSame('Trailer', $response[0]->type);
    }

    public function test_show_watch_providers(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/76479/watch/providers'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/watch_providers')));
        $response = $this->repository->getWatchProviders(76479);
        $this->assertSame('Apple iTunes', $response['AU']->buy[1]->provider_name);
        $this->assertSame('Amazon Prime Video', $response['AU']->flatrate[0]->provider_name);
        $this->assertSame('AU', $response['AU']->country);
    }

    public function test_latest_show(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/latest'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/latest')));
        $response = $this->repository->getLatest();
        $this->assertSame('The Boys', $response->name);
        $this->assertSame('Eric Kripke', $response->created_by[0]->name);
        $this->assertSame('2022-06-09', $response->last_episode_to_air->air_date->format('Y-m-d'));
        $this->assertSame('2022-06-16', $response->next_episode_to_air->air_date->format('Y-m-d'));
        $this->assertSame(8, $response->seasons[1]->episode_count);
    }

    public function test_shows_airing_today(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/airing_today'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/airing_today')));
        $response = $this->repository->getAiringToday();
        $this->assertSame('Pantanal', $response->results[0]->name);
    }

    public function test_shows_on_the_air(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/on_the_air'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/on_the_air')));
        $response = $this->repository->getOnTheAir();
        $this->assertSame('The Boys', $response->results[0]->name);
    }

    public function test_popular_shows(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/popular'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/popular')));
        $response = $this->repository->getPopular();
        $this->assertSame('Stranger Things', $response->results[0]->name);
    }

    public function test_top_rated_shows(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/top_rated'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('shows/top_rated')));
        $response = $this->repository->getTopRated();
        $this->assertSame(123, $response->total_pages);
        $this->assertSame("The D'Amelio Show", $response->results[0]->name);
    }

    protected function requestAppendedRelations(array $relations, string $mock): TvShowDetails
    {
        $appends = implode(',', $relations);
        $this->guzzler->expects($this->atLeastOnce())
            ->endpoint($this->url('tv/76479?append_to_response='.$appends), 'GET')
            ->will(new Response(200, [], $this->getMockResponse($mock)));

        return $this->repository->getTvShow(76479, [new AppendToResponse($relations)]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new TvShowRepository($this->client);
    }
}
