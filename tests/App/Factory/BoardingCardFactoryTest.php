<?php

namespace App\Factory;

use App\BoardingCards\BusBoardingCard;
use App\BoardingCards\FlightBoardingCard;
use App\BoardingCards\TrainBoardingCard;
use App\DTO\BoardingCardDTO;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BoardingCardFactoryTest extends TestCase
{
    private BoardingCardFactory $boardingCardFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->boardingCardFactory = new BoardingCardFactory();
    }

    /**
     * @dataProvider validBoardingCardData
     */
    public function testCreateValidBoardingCard(array $dtoData, string $expectedClass)
    {
        $dto = new BoardingCardDTO($dtoData);

        $boardingCard = $this->boardingCardFactory->create($dto);

        $this->assertInstanceOf($expectedClass, $boardingCard);
    }

    public function testCreateInvalidBoardingCardType()
    {
        $dto = new BoardingCardDTO(['type' => 'invalidType']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid boarding card type.');

        $this->boardingCardFactory->create($dto);
    }

    public static function validBoardingCardData(): array
    {
        $trainData = [
            'type' => 'train',
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
            'transportNumber' => '78A',
            'seat' => '45B',
        ];

        $busData = [
            'type' => 'bus',
            'departure' => 'Barcelona',
            'arrival' => 'Gerona Airport',
            'transportNumber' => 'Airport Bus',
            'seat' => 'No seat assignment',
        ];

        $flightData = [
            'type' => 'flight',
            'departure' => 'Gerona Airport',
            'arrival' => 'Stockholm',
            'transportNumber' => 'SK455',
            'gate' => '45B',
            'seat' => '3A',
            'baggageDrop' => 'ticket counter 344',
        ];

        return [
            [
                $trainData,
                TrainBoardingCard::class],
            [
                $busData,
                BusBoardingCard::class,
            ],
            [
                $flightData,
                FlightBoardingCard::class,
            ],
        ];
    }
}
