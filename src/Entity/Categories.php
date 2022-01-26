<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="parent_id")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Categories::class, mappedBy="parent")
     */
    private $parent_id;

    /**
     * @ORM\OneToMany(targetEntity=Items::class, mappedBy="categorie")
     */
    private $items;

    /**
     * @ORM\ManyToOne(targetEntity=Franchises::class, inversedBy="categories")
     */
    private $franchise;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="categories")
     */
    private $image;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\OneToOne(targetEntity=Type::class, inversedBy="categories", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->parent_id = new ArrayCollection();
        $this->items = new ArrayCollection();
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getParentId(): Collection
    {
        return $this->parent_id;
    }

    public function addParentId(self $parentId): self
    {
        if (!$this->parent_id->contains($parentId)) {
            $this->parent_id[] = $parentId;
            $parentId->setParent($this);
        }

        return $this;
    }

    public function removeParentId(self $parentId): self
    {
        if ($this->parent_id->removeElement($parentId)) {
            // set the owning side to null (unless already changed)
            if ($parentId->getParent() === $this) {
                $parentId->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Items[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Items $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCategorie($this);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getCategorie() === $this) {
                $item->setCategorie(null);
            }
        }

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
            $image->setCategories($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCategories() === $this) {
                $image->setCategories(null);
            }
        }

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
