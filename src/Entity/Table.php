<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $places = null;

    #[ORM\Column(type: 'integer')]
    private ?int $numberTable = null;
    

    #[ORM\ManyToOne(inversedBy: 'capacity')]
    private ?Order $reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaces(): ?string
    {
        return $this->places;
    }

    public function setPlaces(string $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getNumberTable(): ?int
    {
        return $this->numberTable;
    }

    public function setNumberTable(int $numberTable): self
    {
        $this->numberTable = $numberTable;

        return $this;
    }
    
    public function getReservation(): ?Order
    {
        return $this->reservation;
    }

    public function setReservation(?Order $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    
}
