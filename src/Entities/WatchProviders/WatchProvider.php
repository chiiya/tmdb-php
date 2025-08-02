<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\WatchProviders;

use Antwerpes\DataTransferObject\DataTransferObject;

class WatchProvider extends DataTransferObject
{
    public function __construct(
        public int $display_priority,
        public string $logo_path,
        public string $provider_name,
        public int $provider_id,
    ) {}
}
