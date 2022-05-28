<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\People;

trait HasCrewAttributes
{
    public string $credit_id;
    public string $department;
    public string $job;
}
