<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\OpenApi\Model\Operation as OpenApiOperation;
use App\Repository\DocketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DocketRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'docket:item']),
        new GetCollection(normalizationContext: ['groups' => 'docket:list']),
		new Post(normalizationContext: ['groups' => 'docket:item'], 
				status: 301
		),
        new Put(),
        new Delete()
    ],
    order: ['isDone' => 'DESC', 'name' => 'ASC'],
    paginationEnabled: false,
)]
class Docket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	#[Groups(['docket:list', 'docket:item'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreate = null;

    #[ORM\Column(length: 125)]
	#[Groups(['docket:list', 'docket:item'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
	#[Groups(['docket:list', 'docket:item'])]
    private ?string $inform = null;

    #[ORM\Column]
	#[Groups(['docket:list', 'docket:item'])]
    private ?bool $isDone = null;

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
