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
    protected function castItem(mixed $data): BackdropImage|LogoImage|PosterImage|ProfileImage|StillImage
    {
        if (is_array($data)) {
            return match ($data['image_type']) {
                'poster' => PosterImage::decode($data),
                'backdrop' => BackdropImage::decode($data),
                'logo' => LogoImage::decode($data),
                'profile' => ProfileImage::decode($data),
                'still' => StillImage::decode($data),
            };
        }

        throw new LogicException(
            'Caster [ImagesArrayCaster] each item must be an array or an instance of Movie or TvShow.',
        );
    }
}
