<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $palces = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPalces(): ?string
    {
        return $this->palces;
    }

    public function setPalces(string $palces): self
    {
        $this->palces = $palces;

        return $this;
    }
}
