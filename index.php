<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use App\Factory\BoardingCardFactory;
use App\Printer\ConsoleBoardingCardPrinter;
use App\SortBoardingCards;
use App\Sorter\BoardingCardSorter;

// assume data comes from DB as array
$dataCards = [
    [
        'type' => 'bus', // a bus boarding card
        'departure' => 'Stockholm',
        'arrival' => 'Boo',
        'transportNumber' => '117',
        'seat' => '18C',
    ],
    [
        'type' => 'train', // a train boarding card
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'transportNumber' => '78A',
        'seat' => '45B',
    ],
    [
        'type' => 'bus', // a bus boarding card
        'departure' => 'Barcelona',
        'arrival' => 'Gerona Airport',
        'transportNumber' => 'Airport Bus',
        'seat' => null,
    ],
     [
        'type' => 'flight', // a flight boarding card
        'departure' => 'Gerona Airport',
        'arrival' => 'Stockholm',
        'transportNumber' => 'SK455',
        'gate' => '45B',
        'seat' => '3A',
        'baggageDrop' => 'ticket counter 344',
    ],
    [
        'type' => 'flight', // a flight boarding card
        'departure' => 'Kyiv',
        'arrival' => 'Madrid',
        'transportNumber' => 'SK455',
        'gate' => '45B',
        'seat' => '3A',
        'baggageDrop' => 'ticket counter 344',
    ],
];

// create dependencies
$boardingCardFactory = new BoardingCardFactory();
$boardingCardSorter = new BoardingCardSorter();
$boardingCardPrinter = new ConsoleBoardingCardPrinter();

$sortBoardingCards = new SortBoardingCards($boardingCardFactory, $boardingCardSorter, $boardingCardPrinter);

$sortBoardingCards->handle($dataCards);




