<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Certifications;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Antwerpes\DataTransferObject\DataTransferObject;

class CertificationList extends DataTransferObject
{
    public function __construct(
        public string $country,
        /** @var Certification[] */
        #[Cast(ArrayCaster::class, itemType: Certification::class)]
        public array $certifications = [],
    ) {}
}
