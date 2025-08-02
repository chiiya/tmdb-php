<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use ArrayAccess;
use LogicException;
use Traversable;

abstract class AbstractArrayCaster implements CastsProperty
{
    public function __construct(
        private readonly array $types,
    ) {}

    public function unserialize(mixed $value): null|array|ArrayAccess
    {
        if ($value === null) {
            return null;
        }

        foreach ($this->types as $type) {
            if ($type === 'array') {
                return $this->mapInto(destination: [], items: $value);
            }

            if (is_subclass_of($type, ArrayAccess::class)) {
                return $this->mapInto(destination: new $type, items: $value);
            }
        }

        throw new LogicException(
            'Caster [ArrayCaster] may only be used to cast arrays or objects that implement ArrayAccess.',
        );
    }

    public function serialize(mixed $value)
    {
        return $value;
    }

    abstract protected function castItem(mixed $data): mixed;

    private function mapInto(array|ArrayAccess $destination, mixed $items): array|ArrayAccess
    {
        if ($destination instanceof ArrayAccess && ! is_subclass_of($destination, Traversable::class)) {
            throw new LogicException(
                'Caster [ArrayCaster] may only be used to cast ArrayAccess objects that are traversable.',
            );
        }

        foreach ($items as $key => $item) {
            $destination[$key] = $this->castItem($item);
        }

        return $destination;
    }
}
