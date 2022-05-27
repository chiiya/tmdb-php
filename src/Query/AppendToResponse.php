<?php

namespace Chiiya\Tmdb\Query;

class AppendToResponse implements QueryParameterInterface
{
    public const MOVIE_CREDITS = 'movie_credits';
    public const TV_CREDITS = 'tv_credits';
    public const COMBINED_CREDITS = 'combined_credits';
    public const EXTERNAL_IDS = 'external_ids';
    public const TAGGED_IMAGES = 'tagged_images';
    public const IMAGES = 'images';
    public const TRANSLATIONS = 'translations';
    public const ALTERNATIVE_NAMES = 'alternative_names';
    public const CHANGES = 'changes';

    public function __construct(
        protected array $appends = []
    ) {}

    public function getKey(): string
    {
        return 'append_to_response';
    }

    public function getValue(): string
    {
        return implode(',', $this->appends);
    }
}
