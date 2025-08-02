<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Configuration;

use Antwerpes\DataTransferObject\DataTransferObject;

class ImageConfiguration extends DataTransferObject
{
    public function __construct(
        public string $base_url,
        public string $secure_base_url,
        public array $backdrop_sizes,
        public array $logo_sizes,
        public array $poster_sizes,
        public array $profile_sizes,
        public array $still_sizes,
    ) {}
}
