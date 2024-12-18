<?php

namespace App\Entity;

use App\Repository\DisciplineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplineRepository::class)]
class Discipline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $nomDis = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $sportDis = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $descriptionDis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logoDis = null;

    /**
     * @var Collection<int, Athlete>
     */
    #[ORM\OneToMany(targetEntity: Athlete::class, mappedBy: 'discipline')]
    private Collection $athletes;

    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDis(): ?string
    {
        return $this->nomDis;
    }

    public function setNomDis(string $nomDis): static
    {
        $this->nomDis = $nomDis;

        return $this;
    }

    public function getSportDis(): ?string
    {
        return $this->sportDis;
    }

    public function setSportDis(?string $sportDis): static
    {
        $this->sportDis = $sportDis;

        return $this;
    }

    public function getDescriptionDis(): ?string
    {
        return $this->descriptionDis;
    }

    public function setDescriptionDis(?string $descriptionDis): static
    {
        $this->descriptionDis = $descriptionDis;

        return $this;
    }

    public function getLogoDis(): ?string
    {
        return $this->logoDis;
    }

    public function setLogoDis(?string $logoDis): static
    {
        $this->logoDis = $logoDis;

        return $this;
    }

    /**
     * @return Collection<int, Athlete>
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athlete $athlete): static
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes->add($athlete);
            $athlete->setDiscipline($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): static
    {
        if ($this->athletes->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getDiscipline() === $this) {
                $athlete->setDiscipline(null);
            }
        }

        return $this;
    }
}
