<?php

namespace App\Controller;

use App\DTO\IndexFormDTO;
use App\Entity\Tax;
use App\Form\Type\IndexFormType;
use App\Repository\TaxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    private TaxRepository $taxRepository;

    public function __construct(TaxRepository $taxRepository)
    {
        $this->taxRepository = $taxRepository;
    }

    #[Route(name: 'app_index')]
    public function indexAction(Request $request): Response
    {
        $indexForm = $this->createForm(IndexFormType::class);

        $indexForm->handleRequest($request);

        if ($indexForm->isSubmitted() && $indexForm->isValid()) {
            /** @var IndexFormDTO $indexFromDTO */
            $indexFromDTO = $indexForm->getData();
        } else {
            $indexFromDTO = null;
        }

        $price = null;

        if (null !== $indexFromDTO) {
            /** @var Tax $tax */
            $taxPrefix = substr($indexFromDTO->getTaxCode(), 0, 2);
            $tax = $this->taxRepository->findOneBy(['taxPrefix' => $taxPrefix]);

            $taxSum = $indexFromDTO->getProduct()->getPrice() * $tax->getTax();
            $price = $indexFromDTO->getProduct()->getPrice() + $taxSum;
        }

        return $this->render('App/index.html.twig', [
            'form' => $indexForm,
            'total' => $price,
            'product' => $indexFromDTO?->getProduct(),
            'tax' => $tax ?? null,
        ]);
    }
}
