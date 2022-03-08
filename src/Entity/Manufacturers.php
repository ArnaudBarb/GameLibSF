<?php

namespace App\Entity;

use App\Repository\ManufacturersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManufacturersRepository::class)]
class Manufacturers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    private $manuName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManuName(): ?string
    {
        return $this->manuName;
    }

    public function setManuName(string $manuName): self
    {
        $this->manuName = $manuName;

        return $this;
    }
}
