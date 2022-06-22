<?php

namespace App\Entity;

use App\Repository\ArtisanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;
use Vich\UploaderBundle\Entity\File as EntityFile;

#[ORM\Entity(repositoryClass: ArtisanRepository::class)]
#[Vich\Uploadable]
class Artisan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $address;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'string', length: 80)]
    private $email;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'text', nullable: true)]
    private $cover;

    #[Vich\UploadableField(mapping: 'artisans', fileNameProperty: 'cover')]
    #[Assert\Image(mimeTypesMessage: 'Ceci n\'est pas une image')]
    #[Assert\File(maxSize: '1M', maxSizeMessage: 'Cette image ne doit pas dépasser les {{ limit }} {{ suffix }}')]
    private $coverFile;

    
    #[ORM\OneToMany(mappedBy: 'artisan', targetEntity: Owner::class)]
    private $owner;

    #[ORM\ManyToOne(targetEntity: Type::class, cascade: ['persist', 'remove'])]
    private $type;

    #[Vich\UploadableField(mapping: 'artisans', fileNameProperty: 'profile')]
    #[Assert\Image(mimeTypesMessage: 'Ceci n\'est pas une image')]
    #[Assert\File(
        maxSize: '1M', 
        maxSizeMessage: 'Cette image ne doit pas dépasser les {{ limit }} {{ suffix }}'
    )]
    private $profileFile;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Image(mimeTypesMessage: 'Ceci n\'est pas une image')]
    #[Assert\File(maxSize: '1M', maxSizeMessage: 'Cette image ne doit pas dépasser les {{ limit }}')]
    private $Profile;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updated_at;

    public function __construct()
    {
        $this->owner = new ArrayCollection();
    }

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of coverFile
     */ 
    public function getCoverFile(): ?File 
    {
        return $this->coverFile;
    }

    /**
     * Set the value of coverFile
     *
     * @return  self
     */ 
    public function setCoverFile(?File $coverFile = null)
    {
        $this->coverFile = $coverFile;

        if ($coverFile !== null) {
            $this->updated_at = new DateTimeImmutable();

        }

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return Collection<int, Owner>
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    public function addOwner(Owner $owner): self
    {
        if (!$this->owner->contains($owner)) {
            $this->owner[] = $owner;
            $owner->setArtisan($this);
        }

        return $this;
    }

    public function removeOwner(Owner $owner): self
    {
        if ($this->owner->removeElement($owner)) {
            // set the owning side to null (unless already changed)
            if ($owner->getArtisan() === $this) {
                $owner->setArtisan(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProfileFile(): ?File
    {
        return $this->profileFile;
    }

    public function setProfileFile(?File $profileFile = null): self
    {
        $this->profileFile = $profileFile;

        if ($profileFile !== null) {
            $this->updated_at = new DateTimeImmutable();
        }

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->Profile;
    }

    public function setProfile(?string $Profile): self
    {
        $this->Profile = $Profile;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    
}
