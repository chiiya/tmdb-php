<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Query;

class ExternalSource implements QueryParameterInterface
{
    /** @var string */
    final public const IMDB = 'imdb_id';

    /** @var string */
    final public const FREEBASE_MID = 'freebase_mid';

    /** @var string */
    final public const FREEBASE_ID = 'freebase_id';

    /** @var string */
    final public const TVDB = 'tvdb_id';

    /** @var string */
    final public const TVRAGE = 'tvrage_id';

    /** @var string */
    final public const FACEBOOK = 'facebook_id';

    /** @var string */
    final public const TWITTER = 'twitter_id';

    /** @var string */
    final public const INSTAGRAM = 'instagram_id';

    public function __construct(
        protected string $source = 'imdb_id',
    ) {}

    public function getKey(): string
    {
        return 'external_source';
    }

    public function getValue(): string
    {
        return $this->source;
    }
}
