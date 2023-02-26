<?php

namespace App\Entity;

use App\Entity\Interface\ResourceInterface;
use App\Entity\Trait\ResourceTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product implements ResourceInterface
{
    use ResourceTrait;

    #[ORM\Column(name: 'title')]
    private string $title;

    #[ORM\Column(type: 'float')]
    private float $price;

    public function __toString(): string
    {
        return "{$this->title} ({$this->price} USD)";
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
