<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Collections;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Movies\Movie;

class CollectionDetails extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        public string $overview,
        #[Cast(NullableStringCaster::class)]
        public ?string $poster_path = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $backdrop_path = null,
        /** @var Movie[] */
        #[Cast(ArrayCaster::class, itemType: Movie::class)]
        public array $parts = [],
        /** @var PosterImage[] */
        #[Cast(ArrayCaster::class, itemType: PosterImage::class)]
        #[Map(from: 'images.posters')]
        public array $posters = [],
        /** @var BackdropImage[] */
        #[Cast(ArrayCaster::class, itemType: BackdropImage::class)]
        #[Map(from: 'images.backdrops')]
        public array $backdrops = [],
        /** @var CollectionTranslation[] */
        #[Cast(ArrayCaster::class, itemType: CollectionTranslation::class)]
        #[Map(from: 'translations.translations')]
        public array $translations = [],
    ) {}
}
