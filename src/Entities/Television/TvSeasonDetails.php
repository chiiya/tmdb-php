<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Television\Credits\AggregateCredits;

class TvSeasonDetails extends TvSeason
{
    public function __construct(
        public ?AggregateCredits $aggregate_credits = null,
        public ?Credits $credits = null,
        public ?ExternalIds $external_ids = null,
        /** @var array<int, TvEpisode> */
        #[Cast(ArrayCaster::class, TvEpisode::class)]
        public array $episodes = [],
        /** @var array<int, PosterImage>|null */
        #[Cast(ArrayCaster::class, PosterImage::class)]
        #[Map(from: 'images.posters')]
        public array $posters = [],
        /** @var array<int, TelevisionTranslation>|null */
        #[Cast(ArrayCaster::class, TelevisionTranslation::class)]
        #[Map(from: 'translations.translations')]
        public array $translations = [],
        /** @var array<int, Video>|null */
        #[Cast(ArrayCaster::class, Video::class)]
        #[Map(from: 'videos.results')]
        public array $videos = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
