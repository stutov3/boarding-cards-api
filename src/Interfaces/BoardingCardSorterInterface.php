<?php

namespace App\Interfaces;

use App\Collection\BoardingCardsCollection;

interface BoardingCardSorterInterface
{
    public function sort(BoardingCardsCollection $boardingCards): BoardingCardsCollection;
}