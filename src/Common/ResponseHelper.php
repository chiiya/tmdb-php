<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Common;

class ResponseHelper
{
    public static function normalizeDiscriminators(array $response): array
    {
        if (array_key_exists('tagged_images', $response)) {
            $response['tagged_images'] = self::normalizeDiscriminators($response['tagged_images']);
        }

        if (
            array_key_exists('results', $response)
            && count($response['results']) > 0
            && array_key_exists('media', $response['results'][0])
            && array_key_exists('media_type', $response['results'][0])
        ) {
            $response['results'] = array_map(function (array $result) {
                $result['media']['media_type'] = $result['media_type'];

                return $result;
            }, $response['results']);
        }

        return $response;
    }
}
