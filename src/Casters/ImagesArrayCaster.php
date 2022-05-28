<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Casters;

use Chiiya\Tmdb\Entities\Images\BackdropImage;
use Chiiya\Tmdb\Entities\Images\LogoImage;
use Chiiya\Tmdb\Entities\Images\PosterImage;
use Chiiya\Tmdb\Entities\Images\ProfileImage;
use Chiiya\Tmdb\Entities\Images\StillImage;
use LogicException;

class ImagesArrayCaster extends AbstractArrayCaster
{
    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    protected function castItem(mixed $data): PosterImage|BackdropImage|LogoImage|ProfileImage|StillImage
    {
        if (is_array($data)) {
            return match ($data['image_type']) {
                'poster' => new PosterImage(...$data),
                'backdrop' => new BackdropImage(...$data),
                'logo' => new LogoImage(...$data),
                'profile' => new ProfileImage(...$data),
                'still' => new StillImage(...$data),
            };
        }

        throw new LogicException(
            'Caster [ImagesArrayCaster] each item must be an array or an instance of Movie or TvShow.',
        );
    }
}
