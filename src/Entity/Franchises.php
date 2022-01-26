<?php

namespace App\Entity;

use App\Repository\FranchisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FranchisesRepository::class)
 */
class Franchises
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
     * @ORM\OneToMany(targetEntity=Categories::class, mappedBy="franchise")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Items::class, mappedBy="franchise")
     */
    private $items;

    /**
     * @ORM\OneToOne(targetEntity=Type::class, mappedBy="franchise", cascade={"persist", "remove"})
     */
    private $type;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->items = new ArrayCollection();
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

    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setFranchise($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getFranchise() === $this) {
                $category->setFranchise(null);
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
            $item->setFranchise($this);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getFranchise() === $this) {
                $item->setFranchise(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        // set the owning side of the relation if necessary
        if ($type->getFranchise() !== $this) {
            $type->setFranchise($this);
        }

        $this->type = $type;

        return $this;
    }
}
