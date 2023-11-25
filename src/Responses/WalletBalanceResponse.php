<?php

namespace CSGOPaka\Responses;

class WalletBalanceResponse
{
    public function __construct(
        public float  $balance,
        public string $balanceFormatted,
    )
    {
    }

    public function __toString()
    {
        return (string)$this->balance;
    }
}