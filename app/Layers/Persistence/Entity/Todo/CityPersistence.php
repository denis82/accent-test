<?php

namespace App\Layers\Persistence\Entity\Todo;

class CityPersistence
{
    private ?int $_cityId;
    private ?string $_citySlug;
    private ?string $_cityName;
    private ?string $_cityDescription;
    private ?string $_cityCompletionTime;

    public function __construct(
        ?int $cityId,
        ?string $cityName,
        ?string $citySlug,
        ?string $cityDescription,
    ) {
        $this->_cityId   = $cityId;
        $this->_citySlug = $citySlug;
        $this->_cityName = $cityName;
        $this->_cityDescription = $cityDescription;
    }

    public function getId(): ?int
    {
        return $this->_cityId;
    }

    public function getName(): ?string
    {
        return $this->_cityName;
    }

    public function getSlug(): ?string
    {
        return $this->_citySlug;
    }
    public function getDescription(): ?string
    {
        return $this->_cityDescription;
    }
}
