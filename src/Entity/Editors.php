<?php

namespace App\Entity;

use App\Repository\EditorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditorsRepository::class)]
class Editors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $countries;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountries(): ?string
    {
        return $this->countries;
    }

    public function setCountries(?string $countries): self
    {
        $this->countries = $countries;

        return $this;
    }

    /**
     * @return Collection<int, EditorsHasStudios>
     */
    public function getEditorsHasStudios(): Collection
    {
        return $this->editorsHasStudios;
    }

    public function addEditorsHasStudio(EditorsHasStudios $editorsHasStudio): self
    {
        if (!$this->editorsHasStudios->contains($editorsHasStudio)) {
            $this->editorsHasStudios[] = $editorsHasStudio;
            $editorsHasStudio->setIdEditor($this);
        }

        return $this;
    }

    public function removeEditorsHasStudio(EditorsHasStudios $editorsHasStudio): self
    {
        if ($this->editorsHasStudios->removeElement($editorsHasStudio)) {
            // set the owning side to null (unless already changed)
            if ($editorsHasStudio->getIdEditor() === $this) {
                $editorsHasStudio->setIdEditor(null);
            }
        }

        return $this;
    }
}
