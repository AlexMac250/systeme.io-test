<?php

namespace App\DTO;

use App\Entity\Product;
use App\Validation\TaxCodeConstraint;
use Symfony\Component\Validator\Constraints\NotBlank;

class IndexFormDTO
{
    private Product $product;

    #[NotBlank]
    #[TaxCodeConstraint]
    private string $taxCode;

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setTaxCode(string $taxCode): self
    {
        $this->taxCode = $taxCode;

        return $this;
    }

    public function getTaxCode(): string
    {
        return $this->taxCode;
    }
}
