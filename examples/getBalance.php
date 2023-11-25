<?php

use CSGOPaka\CSGOPaka;

require __DIR__ . '/../vendor/autoload.php';

$apiKey = '';
$csgoPaka = new CSGOPaka($apiKey);

$balance = $csgoPaka->walletBalance();
echo $balance; // will return current balance as string
echo PHP_EOL;
echo $balance->balanceFormatted; // will return formatted balance
echo PHP_EOL;
echo $balance->balance; // will return balance as float
