<?php

use CSGOPaka\CSGOPaka;

require __DIR__ . '/../vendor/autoload.php';

$apiKey = '';
$csgoPaka = new CSGOPaka($apiKey);

$tradeUrl = 'https://steamcommunity.com/tradeoffer/new/?partner=1052325988&token=8Cxqzj20';
try {
    $item = $csgoPaka->buyItem(39268, $tradeUrl);
    // returns true, or exceptions
} catch (\CSGOPaka\Exceptions\InvalidApiKeyException $e) {
} catch (\CSGOPaka\Exceptions\ValidationException $e) {
} catch (\CSGOPaka\Exceptions\CSGOPakaException $e) {
}

