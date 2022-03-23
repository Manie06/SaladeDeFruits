<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\PasswordHasherEncoder;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_de_securite_sociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_de_telephone;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_inscription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biographie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activite_preferee;

    /**
     * @ORM\ManyToOne(targetEntity=Qualite::class, inversedBy="utilisateurs")
     */
    private $qualite;

    /**
     * @ORM\ManyToOne(targetEntity=Civilite::class, inversedBy="utilisateurs")
     */
    private $civilite;

    /**
     * @ORM\ManyToMany(targetEntity=ActiviteName::class, inversedBy="utilisateurs")
     */
    private $activite_name;

    /**
     * @ORM\OneToMany(targetEntity=Activites::class, mappedBy="utilisateur")
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity=FicheRenseignements::class, inversedBy="utilisateurs")
     */
    private $fiche_renseignement;

    /**
     * @ORM\ManyToOne(targetEntity=QuestionnaireDeVie::class, inversedBy="utilisateurs")
     */
    private $questionnaire_de_vie;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="utilisateur")
     */
    private $avis;

    public function __construct()
    {
        $this->activite_name = new ArrayCollection();
        $this->activite = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(?string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getNumeroDeSecuriteSociale(): ?string
    {
        return $this->numero_de_securite_sociale;
    }

    public function setNumeroDeSecuriteSociale(?string $numero_de_securite_sociale): self
    {
        $this->numero_de_securite_sociale = $numero_de_securite_sociale;

        return $this;
    }

    public function getNumeroDeTelephone(): ?string
    {
        return $this->numero_de_telephone;
    }

    public function setNumeroDeTelephone(?string $numero_de_telephone): self
    {
        $this->numero_de_telephone = $numero_de_telephone;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(?\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(?string $biographie): self
    {
        $this->biographie = $biographie;

        return $this;
    }

    public function getActivitePreferee(): ?string
    {
        return $this->activite_preferee;
    }

    public function setActivitePreferee(?string $activite_preferee): self
    {
        $this->activite_preferee = $activite_preferee;

        return $this;
    }

    public function getQualite(): ?qualite
    {
        return $this->qualite;
    }

    public function setQualite(?qualite $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getCivilite(): ?Civilite
    {
        return $this->civilite;
    }

    public function setCivilite(?Civilite $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * @return Collection<int, ActiviteName>
     */
    public function getActiviteName(): Collection
    {
        return $this->activite_name;
    }

    public function addActiviteName(ActiviteName $activiteName): self
    {
        if (!$this->activite_name->contains($activiteName)) {
            $this->activite_name[] = $activiteName;
        }

        return $this;
    }

    public function removeActiviteName(ActiviteName $activiteName): self
    {
        $this->activite_name->removeElement($activiteName);

        return $this;
    }

    /**
     * @return Collection<int, Activites>
     */
    public function getActivite(): Collection
    {
        return $this->activite;
    }

    public function addActivite(Activites $activite): self
    {
        if (!$this->activite->contains($activite)) {
            $this->activite[] = $activite;
            $activite->setUtilisateur($this);
        }

        return $this;
    }

    public function removeActivite(Activites $activite): self
    {
        if ($this->activite->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getUtilisateur() === $this) {
                $activite->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getFicheRenseignement(): ?FicheRenseignements
    {
        return $this->fiche_renseignement;
    }

    public function setFicheRenseignement(?FicheRenseignements $fiche_renseignement): self
    {
        $this->fiche_renseignement = $fiche_renseignement;

        return $this;
    }

    public function getQuestionnaireDeVie(): ?QuestionnaireDeVie
    {
        return $this->questionnaire_de_vie;
    }

    public function setQuestionnaireDeVie(?QuestionnaireDeVie $questionnaire_de_vie): self
    {
        $this->questionnaire_de_vie = $questionnaire_de_vie;

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
            $avi->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getUtilisateur() === $this) {
                $avi->setUtilisateur(null);
            }
        }

        return $this;
    }
}
