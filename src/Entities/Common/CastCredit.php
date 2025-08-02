<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Tmdb\Casters\NullableStringCaster;

class CastCredit extends AbstractPerson
{
    public function __construct(
        public string $credit_id,
        public string $character,
        public int $order,
        public ?int $id = null,
        #[Cast(NullableStringCaster::class)]
        public ?string $original_name = null,
        public ?int $cast_id = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
