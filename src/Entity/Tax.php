<?php

namespace App\Entity;

use App\Entity\Interface\ResourceInterface;
use App\Entity\Trait\ResourceTrait;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'tax')]
class Tax implements ResourceInterface
{
    use ResourceTrait;

    #[Column(name: 'tax_prefix')]
    private string $taxPrefix;

    #[Column(name: 'tax', type: 'float')]
    private float $tax;

    /**
     * @return $this
     */
    public function setTaxPrefix(string $taxPrefix): self
    {
        $this->taxPrefix = $taxPrefix;

        return $this;
    }

    public function getTaxPrefix(): string
    {
        return $this->taxPrefix;
    }

    /**
     * @return $this
     */
    public function setTax(float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTax(): float
    {
        return $this->tax;
    }
}
