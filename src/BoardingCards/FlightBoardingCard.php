<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;

class FlightBoardingCard extends BoardingCard implements BoardingCardDescriptionInterface
{
    private string $gate;
    private string $baggageDrop;

    public function __construct(BoardingCardDTO $dto)
    {
        parent::__construct($dto);

        $this->gate = $dto->getGate();
        $this->baggageDrop = $dto->getBaggageDrop();
    }

    public function getDescription(): string
    {
        return parent::getDescription()
            . " Take flight {$this->getTransportNumber()}."
            . " Gate {$this->getGate()}. "
            . $this->getSeatDescription()
            . " Baggage drop at {$this->getBaggageDrop()}.";
    }

    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * @return string
     */
    public function getBaggageDrop(): string
    {
        return $this->baggageDrop;
    }
}