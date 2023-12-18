<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;

class BoardingCard implements BoardingCardDescriptionInterface
{
    protected string $departure;
    protected string $arrival;
    protected string $transportNumber;
    protected ?string $seat;

    public function __construct(BoardingCardDTO $dto)
    {
        $this->departure = $dto->getDeparture();
        $this->arrival = $dto->getArrival();
        $this->transportNumber = $dto->getTransportNumber();
        $this->seat = $dto->getSeat() ?: null;
    }

    public function getDescription(): string
    {
        return "Travel from {$this->getDeparture()} to {$this->getArrival()}.";
    }

    protected function getSeatDescription(): string
    {
        return $this->getSeat() !== null ? "Sit in seat {$this->getSeat()}." : "No seat assignment.";
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    /**
     * @return string|null
     */
    protected function getSeat(): ?string
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    protected function getTransportNumber(): string
    {
        return $this->transportNumber;
    }
}