<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;
use PHPUnit\Framework\TestCase;

class FlightBoardingCardTest extends TestCase
{
    private FlightBoardingCard $flightBoardingCard;

    protected function setUp(): void
    {
        parent::setUp();

        $data = [
            'type' => 'train',
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => 'Flight123',
            'seat' => '22A',
            'gate' => 'Gate1',
            'baggageDrop' => 'BaggageDrop1',
        ];

        $dto = new BoardingCardDTO($data);
        $this->flightBoardingCard = new FlightBoardingCard($dto);
    }

    public function testHasInterface()
    {
        $this->assertInstanceOf(BoardingCardDescriptionInterface::class, $this->flightBoardingCard);
    }


    public function testGetDescription()
    {
        $description = $this->flightBoardingCard->getDescription();

        $this->assertEquals(
            'Travel from DepartureCity to ArrivalCity. Take flight Flight123. Gate Gate1. Sit in seat 22A. Baggage drop at BaggageDrop1.',
            $description
        );
    }

    public function testGetGate()
    {
        $gate = $this->flightBoardingCard->getGate();

        $this->assertEquals('Gate1', $gate);
    }

    public function testGetBaggageDrop()
    {
        $baggageDrop = $this->flightBoardingCard->getBaggageDrop();

        $this->assertEquals('BaggageDrop1', $baggageDrop);
    }
}
