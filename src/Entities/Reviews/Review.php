<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Reviews;

use Spatie\DataTransferObject\DataTransferObject;

class Review extends DataTransferObject
{
    public string $id;
    public string $author;
    public AuthorDetails $author_details;
    public string $content;
    public string $created_at;
    public string $updated_at;
    public string $url;
}
