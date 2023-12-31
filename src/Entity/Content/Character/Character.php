<?php

declare(strict_types=1);

namespace App\Entity\Content\Character;

use App\Repository\Content\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?int $age = null;

    #[ORM\ManyToOne(targetEntity: CharacterStatus::class, inversedBy: 'character')]
    #[ORM\JoinColumn(name: 'status_id', referencedColumnName: 'id')]
    private ?CharacterStatus $status = null;

    #[ORM\ManyToOne(targetEntity: CharacterRace::class, inversedBy: 'character')]
    #[ORM\JoinColumn(name: 'race_id', referencedColumnName: 'id')]
    private ?CharacterRace $race = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getStatus(): ?CharacterStatus
    {
        return $this->status;
    }

    public function setStatus(CharacterStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRace(): ?CharacterRace
    {
        return $this->race;
    }

    public function setRace(CharacterRace $race): self
    {
        $this->race = $race;

        return $this;
    }
}
