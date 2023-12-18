<?php

namespace App\Interfaces;

use App\Collection\BoardingCardsCollection;

interface BoardingCardPrinterInterface
{
    public function printCards(BoardingCardsCollection $boardingCards): void;
}