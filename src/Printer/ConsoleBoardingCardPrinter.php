<?php

namespace App\Printer;

use App\Collection\BoardingCardsCollection;
use App\Interfaces\BoardingCardDescriptionInterface;
use App\Interfaces\BoardingCardPrinterInterface;

/**
 * ConsoleBoardingCardPrinter prints to console
 */
class ConsoleBoardingCardPrinter implements BoardingCardPrinterInterface
{
    public function printCards(BoardingCardsCollection $boardingCards): void
    {
        if ($boardingCards->isEmpty()) {
            return;
        }

        /** @var BoardingCardDescriptionInterface $card */
        foreach ($boardingCards->getBoardingCards() as $index => $card) {
            echo ($index + 1) , '. ' . $card->getDescription() , PHP_EOL;
        }

        echo "You have arrived at your final destination." , PHP_EOL;
    }
}