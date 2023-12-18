<?php

namespace App;

use App\Collection\BoardingCardsCollection;
use App\Factory\BoardingCardFactory;
use App\Interfaces\BoardingCardDescriptionInterface;
use App\Interfaces\BoardingCardPrinterInterface;
use App\Interfaces\BoardingCardSorterInterface;
use PHPUnit\Framework\TestCase;

class SortBoardingCardsTest extends TestCase
{
    private SortBoardingCards $sortBoardingCards;
    /**
     * @var BoardingCardFactory|(BoardingCardFactory&\PHPUnit\Framework\MockObject\MockObject)|\PHPUnit\Framework\MockObject\MockObject
     */
    private BoardingCardFactory $factoryMock;
    private BoardingCardSorterInterface $sorterMock;
    /**
     * @var BoardingCardPrinterInterface|(BoardingCardPrinterInterface&\PHPUnit\Framework\MockObject\MockObject)|\PHPUnit\Framework\MockObject\MockObject
     */
    private BoardingCardPrinterInterface $printerMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->factoryMock = $this->createMock(BoardingCardFactory::class);
        $this->sorterMock = $this->createMock(BoardingCardSorterInterface::class);
        $this->printerMock = $this->createMock(BoardingCardPrinterInterface::class);

        $this->sortBoardingCards = new SortBoardingCards($this->factoryMock, $this->sorterMock, $this->printerMock);
    }

    public function testHandleWithEmptyData()
    {
        $this->factoryMock->expects($this->never())
            ->method('create');

        $this->sorterMock->expects($this->never())
            ->method('sort');

        $this->printerMock->expects($this->never())
            ->method('printCards');

        $this->sortBoardingCards->handle([]);

        // Ensure that no interactions happened with mocks (as the data is empty)
        $this->assertTrue(true);
        $this->expectOutputString('');
    }

    public function testHandleWithNonEmptyData()
    {
        $dataCards = [
            [
                'type' => 'bus', // a bus boarding card
                'departure' => 'Stockholm',
                'arrival' => 'Boo',
                'transportNumber' => '117',
                'seat' => '18C',
            ],
            [
                'type' => 'train', // a train boarding card
                'departure' => 'Madrid',
                'arrival' => 'Barcelona',
                'transportNumber' => '78A',
                'seat' => '45B',
            ],
        ];

        $mockCard1 = $this->createMock(BoardingCardDescriptionInterface::class);
        $mockCard2 = $this->createMock(BoardingCardDescriptionInterface::class);

        $this->factoryMock->expects($this->exactly(2))
            ->method('create')
            ->willReturnOnConsecutiveCalls($mockCard1, $mockCard2);

        $this->sorterMock->expects($this->once())
            ->method('sort')
            ->willReturn(new BoardingCardsCollection());

        $this->printerMock->expects($this->once())
            ->method('printCards');

        $this->sortBoardingCards->handle($dataCards);

        // Ensure that the expected interactions happened with mocks
        $this->assertTrue(true);
    }
}
