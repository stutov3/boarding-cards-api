<?php

namespace App\DTO;

class BoardingCardDTO
{
    private string $type;
    private string $departure;
    private string $arrival;

    private ?string $transportNumber;
    private ?string $seat;
    private ?string $gate;
    private ?string $baggageDrop;

    public function __construct(array $data)
    {
        $this->type = $data['type'] ?? '';
        $this->departure = $data['departure'] ?? '';
        $this->arrival = $data['arrival'] ?? '';
        $this->transportNumber = $data['transportNumber'] ?? null;
        $this->seat = $data['seat'] ?? null;
        $this->gate = $data['gate'] ?? null;
        $this->baggageDrop = $data['baggageDrop'] ?? null;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    /**
     * @return string|null
     */
    public function getTransportNumber(): ?string
    {
        return $this->transportNumber;
    }

    /**
     * @return string|null
     */
    public function getSeat(): ?string
    {
        return $this->seat;
    }

    /**
     * @param string|null $seat
     * @return $this
     */
    public function setSeat(?string $seat): self
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGate(): ?string
    {
        return $this->gate;
    }

    /**
     * @return string|null
     */
    public function getBaggageDrop(): ?string
    {
        return $this->baggageDrop;
    }
}