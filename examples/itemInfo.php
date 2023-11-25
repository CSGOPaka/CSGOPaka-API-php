<?php

use CSGOPaka\CSGOPaka;

require __DIR__ . '/../vendor/autoload.php';

$apiKey = '';
$csgoPaka = new CSGOPaka($apiKey);

$item = $csgoPaka->itemInfo(39268);

// GET ITEM TO ARRAY
print_r($item->toArray());
/* Array
(
    [id] => 39268
    [hash] => y81z2rxhxy
    [status] => WAITING_FOR_SEND
    [boughtAt] => 2023-11-25T16:06:21.000000Z
    [tradeOfferId] => 5601948310
    [errorMessage] =>
    [errorDate] =>
    [lastSend] => 2022-12-16 18:29:30
    [nextTry] =>
    [sendDate] => 2022-12-16 18:29:31
    [image] => https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79fnzL-ckvbnNrfummJW4NE_j7mT8Nrw3QXt_RY-NzymIIHGdw87ZlHZrAe-wO-70ZC4uZzNzndjvz5iuyhP0kvddA/
    [price] => 3.4
    [name] => Glock-18 | Łasica
    [marketHashName] => Glock-18 | Weasel (Minimal Wear)
    [tradeUrl] => https://steamcommunity.com/tradeoffer/new/?partner=1052325988&token=8Cxqzj20
) */

echo $item->getId() . PHP_EOL;
echo $item->getHash() . PHP_EOL;
echo $item->getStatus() . PHP_EOL;
echo $item->getBoughtAt() . PHP_EOL;
echo $item->getTradeOfferId() . PHP_EOL;
echo $item->getErrorMessage() . PHP_EOL;
echo $item->getErrorDate() . PHP_EOL;
echo $item->getLastSend() . PHP_EOL;
echo $item->getNextTry() . PHP_EOL;
echo $item->getSendDate() . PHP_EOL;
echo $item->getImage() . PHP_EOL;
echo $item->getPrice() . PHP_EOL;
echo $item->getName() . PHP_EOL;
echo $item->getMarketHashName() . PHP_EOL;
echo $item->getTradeUrl() . PHP_EOL;
