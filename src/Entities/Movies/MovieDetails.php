<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Movies;

use Chiiya\Tmdb\Entities\Common\HasMediaAttributes;
use Chiiya\Tmdb\Entities\Common\HasMediaDetails;
use Spatie\DataTransferObject\DataTransferObject;

class MovieDetails extends DataTransferObject
{
    use HasMediaAttributes;
    use HasMediaDetails;
    use HasMovieAttributes;
    public ?RelatedCollection $belongs_to_collection;
    public ?int $budget;
    public ?string $imdb_id;
    public int $revenue;
    public ?int $runtime;
}
