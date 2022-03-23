<?php

namespace App\Entity;

use App\Repository\QuestionnaireDeVieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionnaireDeVieRepository::class)
 */
class QuestionnaireDeVie
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
    private $autres_problemes_medical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traitement_medical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heure_traitement_medical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allergies_graves;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sujets_sensibles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_personne_contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qualite_personne_contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone_personne_contact;

    /**
     * @ORM\ManyToOne(targetEntity=HandicapName::class, inversedBy="questionnaireDeVies")
     */
    private $handicap_name;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="questionnaire_de_vie")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutresProblemesMedical(): ?string
    {
        return $this->autres_problemes_medical;
    }

    public function setAutresProblemesMedical(?string $autres_problemes_medical): self
    {
        $this->autres_problemes_medical = $autres_problemes_medical;

        return $this;
    }

    public function getTraitementMedical(): ?string
    {
        return $this->traitement_medical;
    }

    public function setTraitementMedical(?string $traitement_medical): self
    {
        $this->traitement_medical = $traitement_medical;

        return $this;
    }

    public function getHeureTraitementMedical(): ?string
    {
        return $this->heure_traitement_medical;
    }

    public function setHeureTraitementMedical(?string $heure_traitement_medical): self
    {
        $this->heure_traitement_medical = $heure_traitement_medical;

        return $this;
    }

    public function getAllergiesGraves(): ?string
    {
        return $this->allergies_graves;
    }

    public function setAllergiesGraves(?string $allergies_graves): self
    {
        $this->allergies_graves = $allergies_graves;

        return $this;
    }

    public function getSujetsSensibles(): ?string
    {
        return $this->sujets_sensibles;
    }

    public function setSujetsSensibles(?string $sujets_sensibles): self
    {
        $this->sujets_sensibles = $sujets_sensibles;

        return $this;
    }

    public function getNomPersonneContact(): ?string
    {
        return $this->nom_personne_contact;
    }

    public function setNomPersonneContact(?string $nom_personne_contact): self
    {
        $this->nom_personne_contact = $nom_personne_contact;

        return $this;
    }

    public function getQualitePersonneContact(): ?string
    {
        return $this->qualite_personne_contact;
    }

    public function setQualitePersonneContact(?string $qualite_personne_contact): self
    {
        $this->qualite_personne_contact = $qualite_personne_contact;

        return $this;
    }

    public function getTelephonePersonneContact(): ?string
    {
        return $this->telephone_personne_contact;
    }

    public function setTelephonePersonneContact(?string $telephone_personne_contact): self
    {
        $this->telephone_personne_contact = $telephone_personne_contact;

        return $this;
    }

    public function getHandicapName(): ?HandicapName
    {
        return $this->handicap_name;
    }

    public function setHandicapName(?HandicapName $handicap_name): self
    {
        $this->handicap_name = $handicap_name;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setQuestionnaireDeVie($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getQuestionnaireDeVie() === $this) {
                $utilisateur->setQuestionnaireDeVie(null);
            }
        }

        return $this;
    }
}
