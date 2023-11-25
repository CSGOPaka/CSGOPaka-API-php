<?php

namespace CSGOPaka;

use CSGOPaka\Actions\BuyItem;
use CSGOPaka\Actions\ItemInfo;
use CSGOPaka\Actions\SearchItems;
use CSGOPaka\Actions\WalletBalance;
use CSGOPaka\Adapters\Guzzle;
use CSGOPaka\Exceptions\CSGOPakaException;
use CSGOPaka\Exceptions\InvalidApiKeyException;
use CSGOPaka\Exceptions\ValidationException;
use CSGOPaka\Responses\ItemInfoResponse;
use CSGOPaka\Responses\WalletBalanceResponse;

class CSGOPaka
{
    private Guzzle $guzzle;

    public function __construct(string $apiKey)
    {
        $this->guzzle = new Guzzle($apiKey);
    }

    public function walletBalance(): WalletBalanceResponse
    {
        return (new WalletBalance($this->guzzle))->getBalance();
    }

    public function searchItems(): SearchItems
    {
        return (new SearchItems($this->guzzle));
    }

    public function itemInfo(int $id): ItemInfoResponse
    {
        return (new ItemInfo($this->guzzle))->getInfo($id);
    }

    /**
     * @throws InvalidApiKeyException
     * @throws CSGOPakaException
     * @throws ValidationException
     */
    public function buyItem(int $id, string $tradeUrl): bool
    {
        return (new BuyItem($this->guzzle))->buy($id, $tradeUrl);
    }
}