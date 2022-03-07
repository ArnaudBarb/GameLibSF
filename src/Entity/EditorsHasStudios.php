<?php

namespace App\Entity;

use App\Repository\EditorsHasStudiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditorsHasStudiosRepository::class)]
class EditorsHasStudios
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Editors::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_editor;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Studios::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_studio;

    public function getIdEditor(): ?Editors
    {
        return $this->id_editor;
    }

    public function setIdEditor(?Editors $id_editor): self
    {
        $this->id_editor = $id_editor;

        return $this;
    }

    public function getIdStudio(): ?Studios
    {
        return $this->id_studio;
    }

    public function setIdStudio(?Studios $id_studio): self
    {
        $this->id_studio = $id_studio;

        return $this;
    }
}
