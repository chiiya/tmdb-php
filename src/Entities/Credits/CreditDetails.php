<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Credits;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Tmdb\Casters\MediaCaster;
use Chiiya\Tmdb\Entities\Movies\Movie;
use Chiiya\Tmdb\Entities\People\Person;

class CreditDetails extends DataTransferObject
{
    public function __construct(
        public string $credit_type,
        public string $department,
        public string $job,
        public string $id,
        public Person $person,
        #[Cast(MediaCaster::class, [
            'movie' => Movie::class,
            'tv' => TvCredit::class,
        ])]
        public Movie|TvCredit $media,
    ) {}
}
