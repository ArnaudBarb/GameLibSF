<?php

namespace App\Entity;

use App\Repository\UserHasGamesHasPlatformsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserHasGamesHasPlatformsRepository::class)]
class UserHasGamesHasPlatforms
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_user;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: GamesHasPlatforms::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_game;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: GamesHasPlatforms::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_platform;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $rate;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdGame(): ?GamesHasPlatforms
    {
        return $this->id_game;
    }

    public function setIdGame(?GamesHasPlatforms $id_game): self
    {
        $this->id_game = $id_game;

        return $this;
    }

    public function getIdPlatform(): ?GamesHasPlatforms
    {
        return $this->id_platform;
    }

    public function setIdPlatform(?GamesHasPlatforms $id_platform): self
    {
        $this->id_platform = $id_platform;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
