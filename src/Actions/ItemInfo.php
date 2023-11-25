<?php

namespace CSGOPaka\Actions;

use CSGOPaka\Exceptions\CSGOPakaException;
use CSGOPaka\Exceptions\InvalidApiKeyException;
use CSGOPaka\Exceptions\ValidationException;
use CSGOPaka\Responses\ItemInfoResponse;

class ItemInfo extends Actionable
{
    /**
     * @throws InvalidApiKeyException
     * @throws CSGOPakaException
     * @throws ValidationException
     */
    public function getInfo(int $itemId): ItemInfoResponse
    {
        $request = $this->guzzle->request('items/' . $itemId);
        $json = json_decode($request->getBody());
        if ($request->getStatusCode() != 200) {
            throw new CSGOPakaException('An error occurred: ' . $json->message);
        }

        return new ItemInfoResponse($json->data);
    }
}