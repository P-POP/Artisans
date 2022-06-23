<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;
    

    #[ORM\OneToMany(mappedBy: 'artisan', targetEntity: Artisan::class, orphanRemoval: true)]
    private $artisan;

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

     /**
     * @return Collection<int, Artisan>
     */
    public function getArtisan(): Collection
    {
        return $this->artisan;
    }

    public function addArtisan(Artisan $artisan): self
    {
        if (!$this->artisan->contains($artisan)) {
            $this->artisan[] = $artisan;
            $artisan->setType($this);
        }

        return $this;
    }

    public function removeMagazine(Artisan $artisan): self
    {
        if ($this->artisan->removeElement($artisan)) {
            // set the owning side to null (unless already changed)
            if ($artisan->getType() === $this) {
                $artisan->setType(null);
            }
        }

        return $this;
    }

}

