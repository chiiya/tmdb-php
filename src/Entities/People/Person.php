<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Chiiya\Tmdb\Casters\DateTimeCaster;
use Chiiya\Tmdb\Casters\NullableStringCaster;
use Chiiya\Tmdb\Entities\Common\Change;
use Chiiya\Tmdb\Entities\Common\ExternalIds;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;
use DateTimeImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Person extends DataTransferObject
{
    use HasPersonAttributes;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $birthday;

    #[CastWith(DateTimeCaster::class, 'Y-m-d')]
    public ?DateTimeImmutable $deathday;

    /** @var string[] */
    public array $also_known_as;

    #[CastWith(NullableStringCaster::class)]
    public ?string $biography;

    #[CastWith(NullableStringCaster::class)]
    public ?string $place_of_birth;

    #[CastWith(NullableStringCaster::class)]
    public ?string $imdb_id;

    #[CastWith(NullableStringCaster::class)]
    public ?string $homepage;

    /** @var PersonTranslation[]|null */
    #[CastWith(ArrayCaster::class, PersonTranslation::class)]
    #[MapFrom('translations.translations')]
    public ?array $translations;
    public ?ExternalIds $external_ids;

    /** @var ProfileImage[]|null */
    #[CastWith(ArrayCaster::class, ProfileImage::class)]
    #[MapFrom('images.profiles')]
    public ?array $profiles;
    public ?MovieCredits $movie_credits;
    public ?TvCredits $tv_credits;
    public ?CombinedCredits $combined_credits;
    public ?TaggedImagesResponse $tagged_images;

    /** @var Change[]|null */
    #[CastWith(ArrayCaster::class, Change::class)]
    #[MapFrom('changes.changes')]
    public ?array $changes;
}
