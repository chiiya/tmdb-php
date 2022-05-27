<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Enumerators;

class ImageFormat
{
    /** @var string */
    final public const POSTER = 'poster';

    /** @var string */
    final public const BACKDROP = 'backdrop';

    /** @var string */
    final public const PROFILE = 'profile';

    /** @var string */
    final public const LOGO = 'logo';

    /** @var string */
    final public const STILL = 'still';

    public static function formats(): array
    {
        return [
            'posters' => self::POSTER,
            'backdrops' => self::BACKDROP,
            'profiles' => self::PROFILE,
            'logos' => self::LOGO,
            'stills' => self::STILL,
        ];
    }
}
