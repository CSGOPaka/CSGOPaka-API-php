<?php

namespace CSGOPaka\Actions;

use CSGOPaka\Exceptions\CSGOPakaException;
use CSGOPaka\Exceptions\InvalidApiKeyException;
use CSGOPaka\Exceptions\ValidationException;

class BuyItem extends Actionable
{
    /**
     * @throws InvalidApiKeyException
     * @throws CSGOPakaException
     * @throws ValidationException
     */
    public function buy(int $itemId, string $tradeUrl): bool
    {
        $request = $this->guzzle->request('items/' . $itemId, [
            'json' => [
                'tradeUrl' => $tradeUrl,
            ],
        ], 'POST');
        $json = json_decode($request->getBody());
        if ($request->getStatusCode() != 204) {
            throw new CSGOPakaException('An error occurred: ' . $json->message);
        }

        return true;
    }
}