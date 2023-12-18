<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;
use PHPUnit\Framework\TestCase;

class BusBoardingCardTest extends TestCase
{
    public function testGetDescriptionWithSeat()
    {
        $data = [
            'type' => 'bus',
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => 'Bus123',
            'seat' => '22A',
        ];

        $dto = new BoardingCardDTO($data);
        $busBoardingCard = new BusBoardingCard($dto);

        $description = $busBoardingCard->getDescription();

        $this->assertEquals(
            'Travel from DepartureCity to ArrivalCity. Take the bus Bus123. Sit in seat 22A.',
            $description
        );
    }

    public function testGetDescriptionWithoutSeat()
    {
        $data = [
            'type' => 'bus',
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => 'Bus123',
            'seat' => null,
        ];

        $dto = new BoardingCardDTO($data);
        $busBoardingCard = new BusBoardingCard($dto);

        $description = $busBoardingCard->getDescription();

        $this->assertEquals(
            'Travel from DepartureCity to ArrivalCity. Take the bus Bus123. No seat assignment.',
            $description
        );
    }

    public function testHasInterface()
    {
        $data = [
            'type' => 'bus',
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => 'Bus123',
            'seat' => null,
        ];

        $dto = new BoardingCardDTO($data);
        $busBoardingCard = new BusBoardingCard($dto);

        $this->assertInstanceOf(BoardingCardDescriptionInterface::class, $busBoardingCard);
    }
}
