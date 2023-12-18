<?php

namespace App\Sorter;

use App\BoardingCards\BoardingCard;
use App\Collection\BoardingCardsCollection;
use App\DTO\BoardingCardDTO;
use PHPUnit\Framework\TestCase;

class BoardingCardSorterTest extends TestCase
{
    public function testSortWithEmptyCollection()
    {
        $sorter = new BoardingCardSorter();
        $boardingCards = new BoardingCardsCollection();

        $sortedBoardingCards = $sorter->sort($boardingCards);

        $this->assertInstanceOf(BoardingCardsCollection::class, $sortedBoardingCards);
        $this->assertTrue($sortedBoardingCards->isEmpty());
    }

    public function testSortWithNonEmptyCollection()
    {
        // Arrange
        $sorter = new BoardingCardSorter();
        $boardingCards = new BoardingCardsCollection();

        $dto1 = new BoardingCardDTO(['departure' => 'A', 'arrival' => 'B', 'transportNumber' => '1']);
        $dto2 = new BoardingCardDTO(['departure' => 'B', 'arrival' => 'C', 'transportNumber' => '1']);
        $dto3 = new BoardingCardDTO(['departure' => 'C', 'arrival' => 'D', 'transportNumber' => '1']);
        $dto4 = new BoardingCardDTO(['departure' => 'D', 'arrival' => 'E', 'transportNumber' => '1']);

        $card1 = new BoardingCard($dto1);
        $card2 = new BoardingCard($dto2);
        $card3 = new BoardingCard($dto3);
        $card4 = new BoardingCard($dto4);

        $boardingCards->append($card4);
        $boardingCards->append($card2);
        $boardingCards->append($card1);
        $boardingCards->append($card3);

        $sortedBoardingCards = $sorter->sort($boardingCards);

        $this->assertInstanceOf(BoardingCardsCollection::class, $sortedBoardingCards);
        $this->assertCount(4, $sortedBoardingCards->getBoardingCards());

        // Check the order
        $expectedOrder = [$card1, $card2, $card3, $card4];
        foreach ($sortedBoardingCards->getBoardingCards() as $index => $sortedCard) {
            $this->assertSame($expectedOrder[$index], $sortedCard);
        }
    }
}
