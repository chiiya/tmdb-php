<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Reviews;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Review extends DataTransferObject
{
    public string $id;
    public string $author;
    public AuthorDetails $author_details;
    public string $content;
    public string $created_at;
    public string $updated_at;

    #[MapFrom('iso_639_1')]
    public string $iso6391;
    public int $media_id;
    public string $media_title;
    public string $media_type;
    public string $url;
}
