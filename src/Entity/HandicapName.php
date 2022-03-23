<?php

namespace App\Entity;

use App\Repository\HandicapNameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HandicapNameRepository::class)
 */
class HandicapName
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
     * @ORM\OneToMany(targetEntity=QuestionnaireDeVie::class, mappedBy="handicap_name")
     */
    private $questionnaireDeVies;

    public function __construct()
    {
        $this->questionnaireDeVies = new ArrayCollection();
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
     * @return Collection<int, QuestionnaireDeVie>
     */
    public function getQuestionnaireDeVies(): Collection
    {
        return $this->questionnaireDeVies;
    }

    public function addQuestionnaireDeVy(QuestionnaireDeVie $questionnaireDeVy): self
    {
        if (!$this->questionnaireDeVies->contains($questionnaireDeVy)) {
            $this->questionnaireDeVies[] = $questionnaireDeVy;
            $questionnaireDeVy->setHandicapName($this);
        }

        return $this;
    }

    public function removeQuestionnaireDeVy(QuestionnaireDeVie $questionnaireDeVy): self
    {
        if ($this->questionnaireDeVies->removeElement($questionnaireDeVy)) {
            // set the owning side to null (unless already changed)
            if ($questionnaireDeVy->getHandicapName() === $this) {
                $questionnaireDeVy->setHandicapName(null);
            }
        }

        return $this;
    }
}
