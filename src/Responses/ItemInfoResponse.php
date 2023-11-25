<?php

namespace CSGOPaka\Responses;

class ItemInfoResponse
{
    private int $id;
    private ?string $hash;
    private string $status;
    private ?string $boughtAt;
    private ?int $tradeOfferId;
    private ?string $errorMessage;
    private ?string $errorDate;
    private ?string $lastSend;
    private ?string $nextTry;
    private ?string $sendDate;
    private ?string $image;
    private float $price;
    private string $name;
    private string $marketHashName;
    private string $tradeUrl;

    public function __construct(object $item)
    {
        $this->id = $item->id;
        $this->hash = $item->hash;
        $this->status = $item->status;
        $this->boughtAt = $item->bought_at;
        $this->tradeOfferId = $item->trade_offer_id;
        $this->errorMessage = $item->error_message;
        $this->errorDate = $item->error_date;
        $this->lastSend = $item->last_send;
        $this->nextTry = $item->next_try;
        $this->sendDate = $item->send_date;
        $this->image = $item->image;
        $this->price = $item->price;
        $this->name = $item->name;
        $this->marketHashName = $item->market_hash_name;
        $this->tradeUrl = $item->trade_url;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getBoughtAt(): ?string
    {
        return $this->boughtAt;
    }

    public function getTradeOfferId(): int
    {
        return $this->tradeOfferId;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getErrorDate(): ?string
    {
        return $this->errorDate;
    }

    public function getLastSend(): ?string
    {
        return $this->lastSend;
    }

    public function getNextTry(): ?string
    {
        return $this->nextTry;
    }

    public function getSendDate(): ?string
    {
        return $this->sendDate;
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

    public function getTradeUrl(): string
    {
        return $this->tradeUrl;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'hash' => $this->hash,
            'status' => $this->status,
            'boughtAt' => $this->boughtAt,
            'tradeOfferId' => $this->tradeOfferId,
            'errorMessage' => $this->errorMessage,
            'errorDate' => $this->errorDate,
            'lastSend' => $this->lastSend,
            'nextTry' => $this->nextTry,
            'sendDate' => $this->sendDate,
            'image' => $this->image,
            'price' => $this->price,
            'name' => $this->name,
            'marketHashName' => $this->marketHashName,
            'tradeUrl' => $this->tradeUrl,
        ];
    }
}