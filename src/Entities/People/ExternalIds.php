<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

use Spatie\DataTransferObject\DataTransferObject;

class ExternalIds extends DataTransferObject
{
    public ?string $imdb_id;
    public ?string $facebook_id;
    public ?string $freebase_mid;
    public ?string $freebase_id;
    public ?int $tvrage_id;
    public ?string $twitter_id;
    public ?string $instagram_id;
}
