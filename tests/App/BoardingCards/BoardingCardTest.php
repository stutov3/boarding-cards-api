<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use PHPUnit\Framework\TestCase;

class BoardingCardTest extends TestCase
{
    public function testGetDescription(): void
    {
        $dto = new BoardingCardDTO($this->getData());
        $boardingCard = new BoardingCard($dto);

        $description = $boardingCard->getDescription();

        $this->assertEquals('Travel from DepartureCity to ArrivalCity.', $description);
    }

    public function testGetDeparture(): void
    {
        $dto = new BoardingCardDTO($this->getData());
        $boardingCard = new BoardingCard($dto);

        $departure = $boardingCard->getDeparture();

        $this->assertEquals('DepartureCity', $departure);
    }

    public function testGetArrival(): void
    {
        $dto = new BoardingCardDTO($this->getData());
        $boardingCard = new BoardingCard($dto);

        $arrival = $boardingCard->getArrival();

        $this->assertEquals('ArrivalCity', $arrival);
    }

    private function getData(): array
    {
        return [
            'type' => 'train',
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => '78A',
            'seat' => '45B',
        ];
    }
}
