<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

trait HasPagination
{
    public int $page;
    public int $total_pages;
    public int $total_results;

    public function hasMorePages(): bool
    {
        return $this->page < $this->total_pages;
    }

    public function getNextPageNumber(): int
    {
        return $this->page + 1;
    }
}
