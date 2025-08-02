<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Attributes\Map;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Common\AbstractPerson;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;
use DateTimeImmutable;

class PersonDetails extends AbstractPerson
{
    public function __construct(
        public int $id,
        public ?MovieCredits $movie_credits = null,
        public ?TvCredits $tv_credits = null,
        public ?CombinedCredits $combined_credits = null,
        public ?TaggedImagesResponse $tagged_images = null,
        public ?ExternalIds $external_ids = null,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $birthday = null,
        #[Cast(DateTimeCaster::class, 'Y-m-d')]
        public ?DateTimeImmutable $deathday = null,
        /** @var string[] */
        public array $also_known_as = [],
        #[Cast(NullableStringCaster::class)]
        public ?string $biography = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $place_of_birth = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $imdb_id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $homepage = null,
        /** @var PersonTranslation[]|null */
        #[Cast(ArrayCaster::class, PersonTranslation::class)]
        #[Map(from: 'translations.translations')]
        public ?array $translations = [],
        /** @var ProfileImage[]|null */
        #[Cast(ArrayCaster::class, ProfileImage::class)]
        #[Map(from: 'images.profiles')]
        public ?array $profiles = [],
        /** @var Change[]|null */
        #[Cast(ArrayCaster::class, Change::class)]
        #[Map(from: 'changes.changes')]
        public ?array $changes = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
