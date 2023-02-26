<?php

namespace App\Validation;

use App\Repository\TaxRepository;
use Symfony\Component\Validator\Constraint;

class TaxCodeValidator extends \Symfony\Component\Validator\ConstraintValidator
{
    public function __construct(private TaxRepository $taxRepository)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof TaxCodeConstraint) {
            return;
        }

        if (!preg_match('/[A-Z]{2}\d{9,10}/', $value)) {
            $this->context->addViolation($constraint->invalidTaxCodeMessage);

            return;
        }

        if (0 === $this->taxRepository->count(['taxPrefix' => substr($value, 0, 2)])) {
            $this->context->addViolation($constraint->countryNotFoundMessage);
        }
    }
}
