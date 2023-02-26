<?php

namespace App\Repository;

use App\Entity\Tax;
use Doctrine\Persistence\ManagerRegistry;

class TaxRepository extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tax::class);
    }
}
