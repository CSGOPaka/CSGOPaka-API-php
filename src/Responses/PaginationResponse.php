<?php

namespace CSGOPaka\Responses;

class PaginationResponse
{
    private int $total;
    private int $perPage;
    private int $currentPage;
    private ?string $nextPage;
    private ?string $previousPage;
    private ?string $firstPage;
    private int $pages;

    public function __construct(object $paginationObject)
    {
        $this->total = $paginationObject->total;
        $this->perPage = $paginationObject->per_page;
        $this->currentPage = $paginationObject->current_page;
        $this->nextPage = $paginationObject->links->next_page;
        $this->previousPage = $paginationObject->links->previous_page;
        $this->firstPage = $paginationObject->links->first_page;
        $this->pages = $paginationObject->pages;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getNextPage(): ?string
    {
        return $this->nextPage;
    }

    public function getPreviousPage(): ?string
    {
        return $this->previousPage;
    }

    public function getFirstPage(): ?string
    {
        return $this->firstPage;
    }

    public function getPages(): int
    {
        return $this->pages;
    }
}