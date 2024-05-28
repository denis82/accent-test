<?php

namespace App\Layers\Domain\Todo\Entity;

class CityDomain
{
    private ?int $_cityId;
    private string $_cityName;
    private ?string $_citySlug;
    private ?string $_cityDescription;

    public function __construct(
        ?int $cityId,
        ?string $cityName,
        ?string $citySlug,
        ?string $cityDescription
    ) {
        $this->_cityName        = $cityName;
        $this->_citySlug        = $citySlug;
        $this->_cityId          = $cityId;
        $this->_cityDescription = $cityDescription;
    }

    public function getCityId(): ?int
    {
        return $this->_cityId;
    }

    public function getCityName(): string
    {
        return $this->_cityName;
    }

    public function getCitySlug(): string
    {
        return $this->_citySlug;
    }
    public function getCityDescription(): ?string
    {
        return $this->_cityDescription;
    }
}
