<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as BaseAbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Service\Attribute\Required;

class AbstractController extends BaseAbstractController
{
    #[Required]
    public ValidatorInterface $validator;

    public function setValidator(ValidatorInterface $validator): self
    {
        $this->validator = $validator;

        return $this;
    }

    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }
}
