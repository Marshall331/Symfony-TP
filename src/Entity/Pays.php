<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $codeCio = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $nomPays = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $nomContinent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emblemePays = null;

    /**
     * @var Collection<int, Athlete>
     */
    #[ORM\OneToMany(targetEntity: Athlete::class, mappedBy: 'pays')]
    private Collection $athletes;

    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCio(): ?string
    {
        return $this->codeCio;
    }

    public function setCodeCio(string $codeCio): static
    {
        $this->codeCio = $codeCio;

        return $this;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(?string $nomPays): static
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getNomContinent(): ?string
    {
        return $this->nomContinent;
    }

    public function setNomContinent(?string $nomContinent): static
    {
        $this->nomContinent = $nomContinent;

        return $this;
    }

    public function getEmblemePays(): ?string
    {
        return $this->emblemePays;
    }

    public function setEmblemePays(?string $emblemePays): static
    {
        $this->emblemePays = $emblemePays;

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
            $athlete->setPays($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): static
    {
        if ($this->athletes->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getPays() === $this) {
                $athlete->setPays(null);
            }
        }

        return $this;
    }
}
