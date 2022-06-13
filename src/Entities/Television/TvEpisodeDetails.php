<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television;

use Chiiya\Tmdb\Entities\Common\Credits;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Common\Video;
use Chiiya\Tmdb\Entities\Images\StillImage;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TvEpisodeDetails extends TvEpisode
{
    /** @var array<int, Video>|null */
    #[CastWith(ArrayCaster::class, Video::class)]
    #[MapFrom('videos.results')]
    public ?array $videos;

    /** @var array<int, TelevisionTranslation>|null */
    #[CastWith(ArrayCaster::class, TelevisionTranslation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;

    /** @var array<int, StillImage>|null */
    #[CastWith(ArrayCaster::class, StillImage::class)]
    #[MapFrom('images.stills')]
    public ?array $stills;
    public ?ExternalIds $external_ids;
    public ?Credits $credits;
}
