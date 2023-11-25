<?php

namespace CSGOPaka\Actions;

use CSGOPaka\Exceptions\CSGOPakaException;
use CSGOPaka\Exceptions\InvalidApiKeyException;
use CSGOPaka\Exceptions\ValidationException;
use CSGOPaka\Responses\SearchItemsResponse;

class SearchItems extends Actionable
{
    private string $filterName;
    private string $filterMarketHashName;
    private int $filterAppId;
    private int $limit = 100;
    private int $page = 1;

    public function setNameFilter(string $name): self
    {
        $this->filterName = $name;

        return $this;
    }

    public function setMarketHashNameFilter(string $marketHashName): self
    {
        $this->filterMarketHashName = $marketHashName;

        return $this;
    }

    public function setAppIdFilter(int $appId): self
    {
        $this->filterAppId = $appId;

        return $this;
    }

    public function setPage(int $page = 1): self
    {
        $this->page = $page;

        return $this;
    }

    public function setLimit(int $limit = 100): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @throws InvalidApiKeyException
     * @throws CSGOPakaException
     * @throws ValidationException
     */
    public function search(): SearchItemsResponse
    {
        $searchQuery = [
            'page' => $this->page,
            'filter' => [],
        ];
        if (isset($this->filterName)) {
            $searchQuery['filter']['name'] = $this->filterName;
        }
        if (isset($this->filterMarketHashName)) {
            $searchQuery['filter']['market_hash_name'] = $this->filterMarketHashName;
        }
        if (isset($this->filterAppId)) {
            $searchQuery['filter']['appid'] = $this->filterAppId;
        }
        if (isset($this->limit)) {
            $searchQuery['limit'] = $this->limit;
        }
        $request = $this->guzzle->request('items', [
            'query' => $searchQuery,
        ]);
        $json = json_decode($request->getBody());
        if ($request->getStatusCode() != 200) {
            throw new CSGOPakaException('An error occurred: ' . $json->message);
        }

        return new SearchItemsResponse($json);
    }
}