<?php

namespace Chiiya\Tmdb\Enumerators;

class ImageFormat
{
    public const POSTER = 'poster';
    public const BACKDROP = 'backdrop';
    public const PROFILE = 'profile';
    public const LOGO = 'logo';
    public const STILL = 'still';

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
