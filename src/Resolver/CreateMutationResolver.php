<?php

namespace App\Resolver;

use ApiPlatform\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Docket;
use App\Repository\DocketRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CreateMutationResolver implements MutationResolverInterface
{
    /**
     * @param Docket|null $item
     * @param array $context
     * @return object|null
     */
    public function __invoke($item, array $context): ?Docket
    {
        
        if (empty($context['args']['name'])) {
            $name = 'Новое дело';
        }
        else $name = $context['args']['name'];

        $dok = new Docket();
        $dok->isDone = false; // сначала все невыполненные
        $dok->name = $name;
        $entityManager->persist($dok);
        $entityManager->flush();
        $entityManager->clear();

        return Docket;
    }

}