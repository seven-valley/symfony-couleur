<?php

namespace App\Entity;

use App\Repository\CouleurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CouleurRepository::class)
 */
class Couleur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tendance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTendance(): ?bool
    {
        return $this->tendance;
    }

    public function setTendance(bool $tendance): self
    {
        $this->tendance = $tendance;

        return $this;
    }
}
