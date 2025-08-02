<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\StillImage;

class TvEpisodeDetails extends TvEpisode
{
    public function __construct(
        /** @var array<int, Video> */
        #[Cast(ArrayCaster::class, Video::class)]
        #[Map(from: 'videos.results')]
        public array $videos = [],
        /** @var array<int, TelevisionTranslation> */
        #[Cast(ArrayCaster::class, TelevisionTranslation::class)]
        #[Map(from: 'translations.translations')]
        public array $translations = [],
        /** @var array<int, StillImage> */
        #[Cast(ArrayCaster::class, StillImage::class)]
        #[Map(from: 'images.stills')]
        public array $stills = [],
        public ?ExternalIds $external_ids = null,
        public ?Credits $credits = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
