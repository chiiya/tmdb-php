<?php

namespace Chiiya\Tmdb\Responses;

trait HasPagination
{
    public int $page;
    public int $total_pages;
    public int $total_results;
}
