<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests\Unit;

use Chiiya\Tmdb\Entities\Movies\MovieDetails;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\MovieRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class MovieRepositoryTest extends ApiTestCase
{
    protected MovieRepository $repository;

    public function test_get_movie(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/550'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/details')));
        $response = $this->repository->getMovie(550);
        $this->assertSame('Fight Club', $response->original_title);
        $this->assertSame(139, $response->runtime);
    }

    public function test_get_movie_with_appends(): void
    {
        $response = $this->requestAppendedRelations([
            AppendToResponse::ALTERNATIVE_TITLES,
            AppendToResponse::CREDITS,
            AppendToResponse::EXTERNAL_IDS,
            AppendToResponse::IMAGES,
        ], 'movies/appends-1');
        $this->assertSame('Fight Club', $response->original_title);
        $this->assertSame('Borilački klub', $response->alternative_titles[0]->title);
        $this->assertSame('Edward Norton', $response->credits->cast[0]->name);
        $this->assertSame('Arnon Milchan', $response->credits->crew[0]->name);
        $this->assertSame('tt0137523', $response->external_ids->imdb_id);
        $this->assertSame('/rr7E0NoGKxvbkb89eR1GwfoYjpA.jpg', $response->images->backdrops[0]->file_path);

        $response = $this->requestAppendedRelations([
            AppendToResponse::KEYWORDS,
            AppendToResponse::RECOMMENDATIONS,
            AppendToResponse::RELEASE_DATES,
            AppendToResponse::REVIEWS,
            AppendToResponse::SIMILAR,
        ], 'movies/appends-2');
        $this->assertSame('Fight Club', $response->original_title);
        $this->assertSame('based on novel or book', $response->keywords[0]->name);
        $this->assertSame('Pulp Fiction', $response->recommendations[0]->title);
        $this->assertSame(
            '1999-11-11',
            $response->release_dates['AU']->release_dates[0]->release_date->format('Y-m-d'),
        );
        $this->assertStringStartsWith('Pretty awesome movie', $response->reviews[0]->content);
        $this->assertSame('Cool Hand Luke', $response->similar[0]->title);

        $response = $this->requestAppendedRelations([
            AppendToResponse::TRANSLATIONS,
            AppendToResponse::VIDEOS,
            AppendToResponse::WATCH_PROVIDERS,
        ], 'movies/appends-3');
        $this->assertSame('Fight Club', $response->original_title);
        $this->assertSame('Arabic', $response->translations[0]->english_name);
        $this->assertSame('#TBT Trailer', $response->videos[0]->name);
        $this->assertSame('Netflix', $response->watch_providers['AE']->flatrate[0]->provider_name);
    }

    public function test_movie_alternative_titles(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/alternative_titles'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/alternative_titles')));
        $response = $this->repository->getAlternativeTitles(603);
        $this->assertSame('The Matrix 1', $response[3]->title);
    }

    public function test_movie_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/982046/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/changes')));
        $response = $this->repository->getChanges(982046);
        $this->assertSame('production_countries', $response[0]->key);
        $this->assertSame('US', $response[0]->items[0]->value);
        $this->assertSame('62953f8d5507e9009af534c7', $response[1]->items[0]->value['credit_id']);
    }

    public function test_movie_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/credits')));
        $response = $this->repository->getCredits(603);
        $this->assertSame('Keanu Reeves', $response->cast[0]->name);
        $this->assertSame('Barrie M. Osborne', $response->crew[0]->name);
    }

    public function test_movie_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/external_ids')));
        $response = $this->repository->getExternalIds(603);
        $this->assertSame('tt0133093', $response->imdb_id);
    }

    public function test_movie_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/images')));
        $response = $this->repository->getImages(603);
        $this->assertSame('/ncEsesgOJDNrTUED89hYbA117wo.jpg', $response->backdrops[0]->file_path);
        $this->assertSame('/kA8phmxG7h4BIN061fiutckq9Ho.png', $response->logos[0]->file_path);
        $this->assertSame('/pEoqbqtLc4CcwDUDqxmEDSWpWTZ.jpg', $response->posters[0]->file_path);
    }

    public function test_movie_keywords(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/keywords'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/keywords')));
        $response = $this->repository->getKeywords(603);
        $this->assertSame('saving the world', $response[0]->name);
    }

    public function test_movie_recommendations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/recommendations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/recommendations')));
        $response = $this->repository->getRecommendations(603);
        $this->assertSame('The Matrix Reloaded', $response->results[0]->title);
    }

    public function test_movie_release_dates(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/release_dates'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/release_dates')));
        $response = $this->repository->getReleaseDates(603);
        $this->assertSame('DE', $response['DE']->country);
        $this->assertSame('1999-06-17', $response['DE']->release_dates[0]->release_date->format('Y-m-d'));
    }

    public function test_movie_reviews(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/reviews'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/reviews')));
        $response = $this->repository->getReviews(603);
        $this->assertSame(9.5, $response->results[0]->author_details->rating);
    }

    public function test_movie_similar_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/similar'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/similar')));
        $response = $this->repository->getSimilarMovies(603);
        $this->assertSame('Million Dollar Baby', $response->results[0]->title);
    }

    public function test_movie_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/526896/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/translations')));
        $response = $this->repository->getTranslations(526896);
        $this->assertSame('Eine neue Marvel-Legende wird geboren.', $response[0]->data->tagline);
    }

    public function test_movie_videos(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/603/videos'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/videos')));
        $response = $this->repository->getVideos(603);
        $this->assertSame('YouTube', $response[0]->site);
        $this->assertSame('nUEQNVV3Gfs', $response[0]->key);
        $this->assertSame('Trailer', $response[0]->type);
    }

    public function test_movie_watch_providers(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/550/watch/providers'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/watch_providers')));
        $response = $this->repository->getWatchProviders(550);
        $this->assertSame('US', $response['US']->country);
        $this->assertSame('DIRECTV', $response['US']->flatrate[0]->provider_name);
    }

    public function test_latest_movie(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/latest'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/latest')));
        $response = $this->repository->getLatest();
        $this->assertSame('Fight Club', $response->title);
    }

    public function test_now_playing_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/now_playing'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/now_playing')));
        $response = $this->repository->getNowPlaying();
        $this->assertSame(65, $response->total_pages);
        $this->assertSame('Morbius', $response->results[0]->title);
        $this->assertSame('2022-04-16', $response->dates->minimum->format('Y-m-d'));
        $this->assertSame('2022-06-03', $response->dates->maximum->format('Y-m-d'));
    }

    public function test_popular_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/popular'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/popular')));
        $response = $this->repository->getPopular();
        $this->assertSame(33718, $response->total_pages);
        $this->assertSame('Morbius', $response->results[0]->title);
    }

    public function test_top_rated_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/top_rated'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/top_rated')));
        $response = $this->repository->getTopRated();
        $this->assertSame(499, $response->total_pages);
        $this->assertSame('The Shawshank Redemption', $response->results[0]->title);
    }

    public function test_upcoming_movies(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/upcoming'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('movies/upcoming')));
        $response = $this->repository->getUpcoming();
        $this->assertSame(2, $response->total_pages);
        $this->assertSame('Jurassic World Dominion', $response->results[0]->title);
        $this->assertSame('2022-06-04', $response->dates->minimum->format('Y-m-d'));
        $this->assertSame('2022-06-19', $response->dates->maximum->format('Y-m-d'));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new MovieRepository($this->client);
    }

    protected function requestAppendedRelations(array $relations, string $mock): MovieDetails
    {
        $appends = implode(',', $relations);
        $this->guzzler->expects($this->atLeastOnce())
            ->endpoint($this->url('movie/550?append_to_response='.$appends), 'GET')
            ->will(new Response(200, [], $this->getMockResponse($mock)));

        return $this->repository->getMovie(550, [new AppendToResponse($relations)]);
    }
}
