<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
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
     * @ORM\OneToMany(targetEntity=Items::class, mappedBy="type")
     */
    private $items;

    /**
     * @ORM\OneToOne(targetEntity=Franchises::class, inversedBy="type", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $franchise;

    /**
     * @ORM\OneToOne(targetEntity=Categories::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Commandes::class, mappedBy="Type")
     */
    private $commandes;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->commandes = new ArrayCollection();
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
            $item->setType($this);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getType() === $this) {
                $item->setType(null);
            }
        }

        return $this;
    }

    public function getFranchise(): ?Franchises
    {
        return $this->franchise;
    }

    public function setFranchise(Franchises $franchise): self
    {
        $this->franchise = $franchise;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(Categories $categories): self
    {
        // set the owning side of the relation if necessary
        if ($categories->getType() !== $this) {
            $categories->setType($this);
        }

        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setType($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getType() === $this) {
                $commande->setType(null);
            }
        }

        return $this;
    }
}
