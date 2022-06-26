<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Credits;

use Chiiya\Tmdb\Casters\MediaCaster;
use Chiiya\Tmdb\Common\DataTransferObject;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;
use Spatie\DataTransferObject\Attributes\CastWith;

class CreditDetails extends DataTransferObject
{
    public string $credit_type;
    public string $department;
    public string $job;
    public string $id;
    public Person $person;

    #[CastWith(MediaCaster::class, [
        'movie' => Movie::class,
        'tv' => TvCredit::class,
    ])]
    public Movie|TvCredit $media;
}
