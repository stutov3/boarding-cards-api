<?php

namespace App\BoardingCards;

use App\Interfaces\BoardingCardDescriptionInterface;

class BusBoardingCard extends BoardingCard implements BoardingCardDescriptionInterface
{
    public function getDescription(): string
    {
        return parent::getDescription() . " Take the bus {$this->getTransportNumber()}. "
            . $this->getSeatDescription();
    }
}