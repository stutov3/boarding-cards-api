<?php

namespace App\Printer;

use App\Collection\BoardingCardsCollection;
use App\Interfaces\BoardingCardDescriptionInterface;
use PHPUnit\Framework\TestCase;

class ConsoleBoardingCardPrinterTest extends TestCase
{
    public function testPrintCards()
    {
        $printer = new ConsoleBoardingCardPrinter();
        $boardingCards = new BoardingCardsCollection();

        $mockCard1 = $this->createMock(BoardingCardDescriptionInterface::class);
        $mockCard1->expects($this->once())->method('getDescription')->willReturn('Description 1');

        $mockCard2 = $this->createMock(BoardingCardDescriptionInterface::class);
        $mockCard2->expects($this->once())->method('getDescription')->willReturn('Description 2');

        $boardingCards->append($mockCard1);
        $boardingCards->append($mockCard2);

        $expectedOutput = "1. Description 1" . PHP_EOL
            . "2. Description 2" . PHP_EOL
            . "You have arrived at your final destination." . PHP_EOL;

        $this->expectOutputString($expectedOutput);

        $printer->printCards($boardingCards);
    }

    public function testPrintCardsWithEmptyCollection()
    {
        $printer = new ConsoleBoardingCardPrinter();
        $boardingCards = new BoardingCardsCollection();

        $this->expectOutputString('');

        $printer->printCards($boardingCards);
    }
}
