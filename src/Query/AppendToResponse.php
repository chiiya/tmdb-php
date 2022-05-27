<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class AppendToResponse implements QueryParameterInterface
{
    /** @var string */
    final public const MOVIE_CREDITS = 'movie_credits';

    /** @var string */
    final public const TV_CREDITS = 'tv_credits';

    /** @var string */
    final public const COMBINED_CREDITS = 'combined_credits';

    /** @var string */
    final public const EXTERNAL_IDS = 'external_ids';

    /** @var string */
    final public const TAGGED_IMAGES = 'tagged_images';

    /** @var string */
    final public const IMAGES = 'images';

    /** @var string */
    final public const TRANSLATIONS = 'translations';

    /** @var string */
    final public const ALTERNATIVE_NAMES = 'alternative_names';

    /** @var string */
    final public const CHANGES = 'changes';

    public function __construct(
        protected array $appends = [],
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
