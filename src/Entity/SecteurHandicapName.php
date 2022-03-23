<?php

namespace App\Entity;

use App\Repository\SecteurHandicapNameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecteurHandicapNameRepository::class)
 */
class SecteurHandicapName
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
    private $type_name_handicap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeNameHandicap(): ?string
    {
        return $this->type_name_handicap;
    }

    public function setTypeNameHandicap(?string $type_name_handicap): self
    {
        $this->type_name_handicap = $type_name_handicap;

        return $this;
    }
}
