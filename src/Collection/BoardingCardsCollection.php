<?php

namespace App\Collection;

use App\Interfaces\BoardingCardDescriptionInterface;

/**
 * Collection class for boarding cards
 */
class BoardingCardsCollection
{
    private array $boardingCards = [];

    /**
     * @param array $boardingCards
     */
    public function __construct(array $boardingCards = [])
    {
        $this->boardingCards = $boardingCards;
    }


    public function append(BoardingCardDescriptionInterface $boardingCard): void
    {
        $this->boardingCards[] = $boardingCard;
    }

    /**
     * @return array
     */
    public function getBoardingCards(): array
    {
        return $this->boardingCards;
    }

    public function isEmpty(): bool
    {
        return empty($this->boardingCards);
    }
}