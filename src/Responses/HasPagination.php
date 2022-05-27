<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Responses;

trait HasPagination
{
    public int $page;
    public int $total_pages;
    public int $total_results;
}
