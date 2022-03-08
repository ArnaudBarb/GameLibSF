<?php

namespace App\Entity;

use App\Repository\PlatformsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatformsRepository::class)]
class Platforms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $modelName;

    #[ORM\Column(type: 'string', length: 45)]
    private $modelRef;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManufacturers(): ?string
    {
        return $this->modelName;
    }

    public function setManufacturers(string $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->modelRef;
    }

    public function setModel(string $modelRef): self
    {
        $this->modelRef = $modelRef;

        return $this;
    }
}
