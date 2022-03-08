<?php

namespace App\Entity;

use App\Repository\GamesHasUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesHasUsersRepository::class)]
class GamesHasUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Games::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_game;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUser(): ?Users
    {
        return $this->id_user;
    }

    public function setIdUser(?Users $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
