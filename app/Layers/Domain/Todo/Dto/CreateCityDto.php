<?php

namespace App\Layers\Domain\Todo\Dto;
use Illuminate\Support\Str;

class CreateCityDto
{
    private string $_name;
    private string $_slug;
    private string $_description;

    public function __construct(
        string $name,
        string $slug,
        string $description,
        )
    {
        $this->_name = $name;
        $this->_slug = Str::slug($slug);
        $this->_description = $description;
    }

    public function getName(): string
    {
        return $this->_name;
    }
    public function getSlug(): string
    {
        return $this->_slug;
    }
    public function getDescription(): string
    {
        return $this->_description;
    }
}
