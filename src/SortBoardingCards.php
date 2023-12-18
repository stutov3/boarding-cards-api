<?php

namespace App;

use App\Collection\BoardingCardsCollection;
use App\DTO\BoardingCardDTO;
use App\Factory\BoardingCardFactory;
use App\Interfaces\BoardingCardPrinterInterface;
use App\Interfaces\BoardingCardSorterInterface;

class SortBoardingCards
{
    private BoardingCardFactory $boardingCardFactory;
    private BoardingCardSorterInterface $boardingCardSorter;
    private BoardingCardPrinterInterface $boardingCardPrinter;

    public function __construct(
        BoardingCardFactory $boardingCardFactory,
        BoardingCardSorterInterface $boardingCardSorter,
        BoardingCardPrinterInterface $boardingCardPrinter
    ) {
        $this->boardingCardFactory = $boardingCardFactory;
        $this->boardingCardSorter = $boardingCardSorter;
        $this->boardingCardPrinter = $boardingCardPrinter;

    }

    public function handle(array $dataCards): void
    {
        if (empty($dataCards)) {
            return;
        }

        $cardsCollection = new BoardingCardsCollection();

        // Create boarding cards instances using the factory and add to collection
        foreach ($dataCards as $dataCard) {
            $boardingCard = $this->boardingCardFactory->create(new BoardingCardDTO($dataCard));
            $cardsCollection->append($boardingCard);
        }

        // sort boarding cards
        $sortedCardsCollection = $this->boardingCardSorter->sort($cardsCollection);

        // print
        $this->boardingCardPrinter->printCards($sortedCardsCollection);
    }
}