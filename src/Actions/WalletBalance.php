<?php

namespace CSGOPaka\Actions;

use CSGOPaka\Exceptions\CSGOPakaException;
use CSGOPaka\Responses\WalletBalanceResponse;

class WalletBalance extends Actionable
{
    public function getBalance(): WalletBalanceResponse
    {
        $request = $this->guzzle->request('wallet');
        $json = json_decode($request->getBody());
        if ($request->getStatusCode() != 200) {
            throw new CSGOPakaException('An error occurred: ' . $json->message);
        }

        return new WalletBalanceResponse(
            (float)$json->data->balance,
            $json->data->balanceFormatted,
        );
    }
}