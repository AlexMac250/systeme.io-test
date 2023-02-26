<?php

namespace App\Validation;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class TaxCodeConstraint extends Constraint
{
    public string $invalidTaxCodeMessage = 'Invalid tax code';
    public string $countryNotFoundMessage = 'Country not found';

    public string $mode = 'strict';

    public function validatedBy(): string
    {
        return TaxCodeValidator::class;
    }
}
