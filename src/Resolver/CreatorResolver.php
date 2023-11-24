<?php

namespace App\Resolver;

use ApiPlatform\Exception\ItemNotFoundException;
use ApiPlatform\GraphQl\Resolver\QueryItemResolverInterface;
use App\Entity\Docket;
use App\Repository\DocketRepository;
//use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Serializer\Annotation\Groups;

class CreatorResolver implements QueryItemResolverInterface
{
    public function __construct(private readonly DocketRepository $repository) {
    }
	
    /**
     * @param mixed[] $context
     *
     * @return Docket|null
     */
    public function __invoke(?object $item, array $context): object
    {
        if (!isset($context['args']['slug'])) {
            throw new ItemNotFoundException();
        }

        Assert::isInstanceOf($item, Docket::class);

        return $item;
    }
}