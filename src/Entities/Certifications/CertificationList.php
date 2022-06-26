<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Certifications;

use Chiiya\Tmdb\Common\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CertificationList extends DataTransferObject
{
    public string $country;

    /** @var Certification[] */
    #[CastWith(ArrayCaster::class, Certification::class)]
    public array $certifications;
}
