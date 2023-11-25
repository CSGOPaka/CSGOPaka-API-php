<?php

use CSGOPaka\CSGOPaka;

require __DIR__ . '/../vendor/autoload.php';

$apiKey = '';
$csgoPaka = new CSGOPaka($apiKey);

$searcher = $csgoPaka->searchItems();

$searcher->setNameFilter('AK-47');
$searcher->setMarketHashNameFilter('(Well-Worn)');
$searcher->setAppIdFilter(730);
$searcher->setPage(2);
$searcher->setLimit(5);
$result = $searcher->search();

// GET PAGINATION
$pagination = $result->getPagination();

echo $pagination->getCurrentPage() . PHP_EOL;
echo $pagination->getFirstPage() . PHP_EOL;
echo $pagination->getNextPage() . PHP_EOL;
echo $pagination->getPages() . PHP_EOL;
echo $pagination->getPerPage() . PHP_EOL;
echo $pagination->getPreviousPage() . PHP_EOL;
echo $pagination->getTotal() . PHP_EOL . PHP_EOL;

//GET ITEMS
$items = $result->getItems(); // returns array
foreach ($items as $item) {
    // $item is an instance of SearchSingleItemResponse class

    // get $item to array
    print_r($item->toArray());
    /* Array
        (
            [id] => 39278
            [appId] => 730
            [image] => https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV09G3h5SOhe7LPr7Vn35cpsEl0-2Xrdii3APt-RI4ZG71IdOXelJoZVDX_li7kOu-1MW6uZ_JyHV9-n51hRUaMfs/
            [price] => 4.48
            [name] => AK-47 | Elitarny
            [marketHashName] => AK-47 | Elite Build (Well-Worn)
            [steamPrice] => 3.73
        )
    */

    echo PHP_EOL;

    // OR use getters:
    echo $item->getId() . PHP_EOL;
    echo $item->getName() . PHP_EOL;
    echo $item->getAppId() . PHP_EOL;
    echo $item->getImage() . PHP_EOL;
    echo $item->getPrice() . PHP_EOL;
    echo $item->getMarketHashName() . PHP_EOL;
    echo $item->getSteamPrice() . PHP_EOL;

    break;
}

