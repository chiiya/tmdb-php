<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Entities\Television\Credits;

use Chiiya\Tmdb\Common\DataTransferObject;

class CreatedBy extends DataTransferObject
{
    public int $id;
    public string $credit_id;
    public string $name;
    public int $gender;
    public ?string $profile_path;
}
