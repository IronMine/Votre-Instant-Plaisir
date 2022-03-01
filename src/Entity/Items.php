<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 */
class Items
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $crud;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="items")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="items")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="items")
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $little_description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sell;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=Franchises::class, inversedBy="items")
     */
    private $franchise;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    public function __construct()
    {
        $this->image = new ArrayCollection();
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

    public function getCrud(): ?string
    {
        return $this->crud;
    }

    public function setCrud(string $crud): self
    {
        $this->crud = $crud;

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

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Images $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
            $image->setItems($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getItems() === $this) {
                $image->setItems(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLittleDescription(): ?string
    {
        return $this->little_description;
    }

    public function setLittleDescription(?string $little_description): self
    {
        $this->little_description = $little_description;

        return $this;
    }

    public function getSell(): ?int
    {
        return $this->sell;
    }

    public function setSell(?int $sell): self
    {
        $this->sell = $sell;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getFranchise(): ?Franchises
    {
        return $this->franchise;
    }

    public function setFranchise(?Franchises $franchise): self
    {
        $this->franchise = $franchise;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
