<?php

namespace App\Entity;

use App\Repository\ActivitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivitesRepository::class)
 */
class Activites
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
    private $titre_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_depart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_postal_depart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_depart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_postal_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_retour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_postal_retour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_retour;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_debut;

  

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_fin;

   

    /**
     * @ORM\ManyToOne(targetEntity=ActiviteName::class, inversedBy="activites")
     */
    private $activite_name;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenTransport::class, inversedBy="activites")
     */
    private $moyen_transport;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="activites")
     */
    private $avis;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="activite")
     */
    private $utilisateur;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreActivite(): ?string
    {
        return $this->titre_activite;
    }

    public function setTitreActivite(?string $titre_activite): self
    {
        $this->titre_activite = $titre_activite;

        return $this;
    }

    public function getDescriptionActivite(): ?string
    {
        return $this->description_activite;
    }

    public function setDescriptionActivite(?string $description_activite): self
    {
        $this->description_activite = $description_activite;

        return $this;
    }

    public function getAdresseDepart(): ?string
    {
        return $this->adresse_depart;
    }

    public function setAdresseDepart(?string $adresse_depart): self
    {
        $this->adresse_depart = $adresse_depart;

        return $this;
    }

    public function getCodePostalDepart(): ?string
    {
        return $this->code_postal_depart;
    }

    public function setCodePostalDepart(?string $code_postal_depart): self
    {
        $this->code_postal_depart = $code_postal_depart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->ville_depart;
    }

    public function setVilleDepart(?string $ville_depart): self
    {
        $this->ville_depart = $ville_depart;

        return $this;
    }

    public function getAdresseActivite(): ?string
    {
        return $this->adresse_activite;
    }

    public function setAdresseActivite(?string $adresse_activite): self
    {
        $this->adresse_activite = $adresse_activite;

        return $this;
    }

    public function getCodePostalActivite(): ?string
    {
        return $this->code_postal_activite;
    }

    public function setCodePostalActivite(?string $code_postal_activite): self
    {
        $this->code_postal_activite = $code_postal_activite;

        return $this;
    }

    public function getVilleActivite(): ?string
    {
        return $this->ville_activite;
    }

    public function setVilleActivite(?string $ville_activite): self
    {
        $this->ville_activite = $ville_activite;

        return $this;
    }

    public function getAdresseRetour(): ?string
    {
        return $this->adresse_retour;
    }

    public function setAdresseRetour(?string $adresse_retour): self
    {
        $this->adresse_retour = $adresse_retour;

        return $this;
    }

    public function getCodePostalRetour(): ?string
    {
        return $this->code_postal_retour;
    }

    public function setCodePostalRetour(?string $code_postal_retour): self
    {
        $this->code_postal_retour = $code_postal_retour;

        return $this;
    }

    public function getVilleRetour(): ?string
    {
        return $this->ville_retour;
    }

    public function setVilleRetour(?string $ville_retour): self
    {
        $this->ville_retour = $ville_retour;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }


    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

   
    public function getActiviteName(): ?ActiviteName
    {
        return $this->activite_name;
    }

    public function setActiviteName(?ActiviteName $activite_name): self
    {
        $this->activite_name = $activite_name;

        return $this;
    }

    public function getMoyenTransport(): ?MoyenTransport
    {
        return $this->moyen_transport;
    }

    public function setMoyenTransport(?MoyenTransport $moyen_transport): self
    {
        $this->moyen_transport = $moyen_transport;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setActivites($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getActivites() === $this) {
                $avi->setActivites(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
