<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\Images\StillImage;
use Spatie\DataTransferObject\Caster;

class ImageCaster implements Caster
{
    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function cast(mixed $value): PosterImage|BackdropImage|LogoImage|ProfileImage|StillImage
    {
        return match ($value['image_type']) {
            'poster' => new PosterImage(...$value),
            'backdrop' => new BackdropImage(...$value),
            'logo' => new LogoImage(...$value),
            'profile' => new ProfileImage(...$value),
            'still' => new StillImage(...$value),
        };
    }
}
