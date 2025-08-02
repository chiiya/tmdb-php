<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class CrewCredit extends AbstractPerson
{
    public function __construct(
        public string $credit_id,
        public string $department,
        public string $job,
        public ?int $id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $original_name = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
