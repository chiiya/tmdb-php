<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Antwerpes\DataTransferObject\DataTransferObject;

class CreatedBy extends DataTransferObject
{
    public function __construct(
        public int $id,
        public string $credit_id,
        public string $name,
        public ?int $gender = null,
        public ?string $profile_path = null,
    ) {}
}
