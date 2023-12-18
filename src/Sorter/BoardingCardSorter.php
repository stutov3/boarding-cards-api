<?php

namespace App\Sorter;

use App\BoardingCards\BoardingCard;
use App\Collection\BoardingCardsCollection;
use App\Interfaces\BoardingCardSorterInterface;

/**
 * BoardingCardSorter sorts boarding cards
 */
class BoardingCardSorter implements BoardingCardSorterInterface
{
    public function sort(BoardingCardsCollection $boardingCards): BoardingCardsCollection
    {
        $departureMap = [];
        $arrivalMap = [];
        $sortedBoardingCards = new BoardingCardsCollection();

        // Build departure and arrival maps
        /** @var BoardingCard $card */
        foreach ($boardingCards->getBoardingCards() as $card) {
            $departureMap[$card->getDeparture()] = $card;
            $arrivalMap[$card->getArrival()] = $card;
        }

        // Find the start point (departure without an arrival)
        $startPoint = key(array_diff_key($departureMap, $arrivalMap));

        if ($startPoint === null) {
            return $sortedBoardingCards;
        }

        // Traverse the chain to create the sorted list
        $currentPoint = $startPoint;
        while (isset($departureMap[$currentPoint])) {
            $card = $departureMap[$currentPoint];
            $sortedBoardingCards->append($card);
            $currentPoint = $card->getArrival();
        }

        return $sortedBoardingCards;
    }
}