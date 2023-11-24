<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\DeleteMutation;
use ApiPlatform\Metadata\GraphQl\Mutation;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use App\Repository\DocketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Resolver\CreatorResolver;

#[ORM\Entity(repositoryClass: DocketRepository::class)]
#[ApiResource(graphQlOperations: [
    new Query(resolver: CreatorResolver::class),
    new QueryCollection(),
    new Mutation(name: 'create'),
    new Mutation(name: 'update'),
    new DeleteMutation(name: 'delete'),
]
)]
class Docket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

	#[Groups(['docket:list', 'docket:item'])]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreate = null;

    #[ORM\Column(length: 125)]
	#[Groups(['docket:list', 'docket:item'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
	#[Groups(['docket:list', 'docket:item'])]
    private ?string $inform = null;

    #[ORM\Column]
//	#[Groups(['docket:list', 'docket:item'])]
    private ?bool $isDone = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): static
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getInform(): ?string
    {
        return $this->inform;
    }

    public function setInform(string $inform): static
    {
        $this->inform = $inform;

        return $this;
    }

    public function isIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): static
    {
        $this->isDone = $isDone;

        return $this;
    }
}
