<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Common;

use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\DataTransferObject as DTO;
use Spatie\DataTransferObject\Exceptions\ValidationException;
use Spatie\DataTransferObject\Reflection\DataTransferObjectClass;

class DataTransferObject extends DTO
{
    /**
     * @throws ValidationException
     * @noinspection PhpMissingParentConstructorInspection
     */
    public function __construct(...$args)
    {
        if (is_array($args[0] ?? null)) {
            $args = $args[0];
        }

        $class = new DataTransferObjectClass($this);

        foreach ($class->getProperties() as $property) {
            $property->setValue(Arr::get($args, $property->name) ?? $this->{$property->name} ?? null);
        }

        $class->validate();
    }
}
