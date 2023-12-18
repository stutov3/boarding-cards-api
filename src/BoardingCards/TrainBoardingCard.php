<?php

namespace App\BoardingCards;

use App\Interfaces\BoardingCardDescriptionInterface;

class TrainBoardingCard extends BoardingCard implements BoardingCardDescriptionInterface
{
    public function getDescription(): string
    {
        return parent::getDescription()
            . " Take train {$this->getTransportNumber()}. "
            . $this->getSeatDescription();
    }
}