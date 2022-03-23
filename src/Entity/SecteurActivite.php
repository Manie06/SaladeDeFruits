<?php

namespace App\Entity;

use App\Repository\SecteurActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecteurActiviteRepository::class)
 */
class SecteurActivite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=ActiviteName::class, mappedBy="secteur")
     */
    private $activiteNames;

    public function __construct()
    {
        $this->activiteNames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, ActiviteName>
     */
    public function getActiviteNames(): Collection
    {
        return $this->activiteNames;
    }

    public function addActiviteName(ActiviteName $activiteName): self
    {
        if (!$this->activiteNames->contains($activiteName)) {
            $this->activiteNames[] = $activiteName;
            $activiteName->setSecteur($this);
        }

        return $this;
    }

    public function removeActiviteName(ActiviteName $activiteName): self
    {
        if ($this->activiteNames->removeElement($activiteName)) {
            // set the owning side to null (unless already changed)
            if ($activiteName->getSecteur() === $this) {
                $activiteName->setSecteur(null);
            }
        }

        return $this;
    }
}
