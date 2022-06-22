<?php

namespace App\Entity;

use App\Repository\OwnerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OwnerRepository::class)]
class Owner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $avis;

    #[ORM\ManyToOne(targetEntity: Artisan::class, inversedBy: 'owner')]
    private $artisan;

    #[ORM\Column(type: 'integer')]
    private $score;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Owner')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getArtisan(): ?Artisan
    {
        return $this->artisan;
    }

    public function setArtisan(?Artisan $artisan): self
    {
        $this->artisan = $artisan;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    
}
