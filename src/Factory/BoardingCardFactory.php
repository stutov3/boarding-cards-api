<?php

namespace App\Factory;

use App\BoardingCards\BusBoardingCard;
use App\BoardingCards\FlightBoardingCard;
use App\BoardingCards\TrainBoardingCard;
use App\DTO\BoardingCardDTO;
use App\Interfaces\BoardingCardDescriptionInterface;
use InvalidArgumentException;

/**
 * BoardingCardFactory created an instances for different type of boarding cards
 */
class BoardingCardFactory
{
    public const TYPE_TRAIN = 'train';
    public const TYPE_BUS = 'bus';
    public const TYPE_FLIGHT = 'flight';

    public function create(BoardingCardDTO $dto): BoardingCardDescriptionInterface
    {
        return match ($dto->getType()) {
            self::TYPE_TRAIN => new TrainBoardingCard($dto),
            self::TYPE_BUS => new BusBoardingCard($dto),
            self::TYPE_FLIGHT => new FlightBoardingCard($dto),
            default => throw new InvalidArgumentException('Invalid boarding card type.'),
        };
    }

}