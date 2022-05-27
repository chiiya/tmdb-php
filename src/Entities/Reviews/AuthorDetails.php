<?php

namespace Chiiya\Tmdb\Entities\Reviews;

use Spatie\DataTransferObject\DataTransferObject;

class AuthorDetails extends DataTransferObject
{
    public string $name;
    public string $username;
    public string $avatar_path;
    public int $rating;
}
