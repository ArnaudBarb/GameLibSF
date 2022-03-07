<?php

namespace App\Entity;

use App\Repository\StudiosHasGamesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudiosHasGamesRepository::class)]
class StudiosHasGames
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Studios::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_studio;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Games::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_game;

    public function getIdStudio(): ?Studios
    {
        return $this->id_studio;
    }

    public function setIdStudio(?Studios $id_studio): self
    {
        $this->id_studio = $id_studio;

        return $this;
    }

    public function getIdGame(): ?Games
    {
        return $this->id_game;
    }

    public function setIdGame(?Games $id_game): self
    {
        $this->id_game = $id_game;

        return $this;
    }
}
