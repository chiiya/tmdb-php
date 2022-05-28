<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use ArrayAccess;
use LogicException;
use Spatie\DataTransferObject\Caster;
use Traversable;

abstract class AbstractArrayCaster implements Caster
{
    public function __construct(
        private array $types,
    ) {}

    public function cast(mixed $value): array|ArrayAccess
    {
        foreach ($this->types as $type) {
            if ($type === 'array') {
                return $this->mapInto(destination: [], items: $value);
            }

            if (is_subclass_of($type, ArrayAccess::class)) {
                return $this->mapInto(destination: new $type, items: $value);
            }
        }

        throw new LogicException(
            'Caster '.static::class.' may only be used to cast arrays or objects that implement ArrayAccess.',
        );
    }

    protected function mapInto(array|ArrayAccess $destination, mixed $items): array|ArrayAccess
    {
        if ($destination instanceof ArrayAccess && ! is_subclass_of($destination, Traversable::class)) {
            throw new LogicException(
                'Caster '.static::class.' may only be used to cast ArrayAccess objects that are traversable.',
            );
        }

        foreach ($items as $key => $item) {
            $destination[$key] = $this->castItem($item);
        }

        return $destination;
    }

    abstract protected function castItem(mixed $data): mixed;
}
