<?php

namespace CSGOPaka\Responses;

class SearchItemsResponse
{
    private PaginationResponse $pagination;
    private array $items = [];

    public function __construct(object $response)
    {
        $this->pagination = new PaginationResponse($response->pagination);
        foreach ($response->data as $item) {
            $this->items[] = new SearchSingleItemResponse($item);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getPagination(): PaginationResponse
    {
        return $this->pagination;
    }
}