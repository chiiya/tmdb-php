<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Tests;

use BlastCloud\Guzzler\Guzzler;
use PHPUnit\Framework\Attributes\After;
use PHPUnit\Framework\Attributes\Before;

trait UsesGuzzler
{
    public Guzzler $guzzler;

    #[Before]
    public function setUpGuzzler(): void
    {
        $this->guzzler = new Guzzler($this);
    }

    #[After]
    public function runGuzzlerAssertions(): void
    {
        (function (): void {
            $this->runExpectations();
        })->call($this->guzzler);
    }
}
