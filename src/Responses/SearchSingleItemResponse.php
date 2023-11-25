<?php

namespace CSGOPaka\Responses;

class SearchSingleItemResponse
{
    private int $id;
    private int $appId;
    private string $image;
    private float $price;
    private string $name;
    private string $marketHashName;
    private float $steamPrice;

    public function __construct(object $itemData)
    {
        $this->id = $itemData->id;
        $this->appId = $itemData->appid;
        $this->image = $itemData->image;
        $this->price = $itemData->price;
        $this->name = $itemData->name;
        $this->marketHashName = $itemData->market_hash_name;
        $this->steamPrice = $itemData->steam_price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAppId(): int
    {
        return $this->appId;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMarketHashName(): string
    {
        return $this->marketHashName;
    }

    public function getSteamPrice(): float
    {
        return $this->steamPrice;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'appId' => $this->appId,
            'image' => $this->image,
            'price' => $this->price,
            'name' => $this->name,
            'marketHashName' => $this->marketHashName,
            'steamPrice' => $this->steamPrice,
        ];
    }
}