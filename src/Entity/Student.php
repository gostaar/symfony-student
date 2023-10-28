<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: SchoolYear::class, inversedBy: 'students')]
    private Collection $schoolyears;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'students')]
    private Collection $tag;

    #[ORM\ManyToMany(targetEntity: Projet::class, inversedBy: 'students')]
    private Collection $Projet;

    public function __construct()
    {
        $this->schoolyears = new ArrayCollection();
        $this->tag = new ArrayCollection();
        $this->Projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, SchoolYear>
     */
    public function getSchoolyears(): Collection
    {
        return $this->schoolyears;
    }

    public function addSchoolyear(SchoolYear $schoolyear): static
    {
        if (!$this->schoolyears->contains($schoolyear)) {
            $this->schoolyears->add($schoolyear);
        }

        return $this;
    }

    public function removeSchoolyear(SchoolYear $schoolyear): static
    {
        $this->schoolyears->removeElement($schoolyear);

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tag->contains($tag)) {
            $this->tag->add($tag);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        $this->tag->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjet(): Collection
    {
        return $this->Projet;
    }

    public function addProjet(Projet $Projet): static
    {
        if (!$this->Projet->contains($Projet)) {
            $this->Projet->add($Projet);
        }

        return $this;
    }

    public function removeProjet(Projet $Projet): static
    {
        $this->Projet->removeElement($Projet);

        return $this;
    }

}
