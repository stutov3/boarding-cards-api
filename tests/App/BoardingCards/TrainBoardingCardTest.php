<?php

namespace App\BoardingCards;

use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;
use PHPUnit\Framework\TestCase;

class TrainBoardingCardTest extends TestCase
{
    /**
     * @dataProvider boardingCardDataProvider
     */
    public function testGetDescription(BoardingCardDTO $dto, string $expectedDescription)
    {
        $trainBoardingCard = new TrainBoardingCard($dto);

        $description = $trainBoardingCard->getDescription();

        $this->assertInstanceOf(BoardingCardDescriptionInterface::class, $trainBoardingCard);
        $this->assertEquals($expectedDescription, $description);
    }

    public static function boardingCardDataProvider(): array
    {
        $data = [
            'type' => 'train', // a train boarding card
            'departure' => 'DepartureCity',
            'arrival' => 'ArrivalCity',
            'transportNumber' => 'Train123',
            'seat' => '22A',
        ];

        return [
            [
                new BoardingCardDTO($data),
                'Travel from DepartureCity to ArrivalCity. Take train Train123. Sit in seat 22A.',
            ],
            [
                (new BoardingCardDTO($data))->setSeat(null),
                'Travel from DepartureCity to ArrivalCity. Take train Train123. No seat assignment.',
            ],
        ];
    }
}
