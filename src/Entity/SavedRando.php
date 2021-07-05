<?php

namespace App\Entity;

use App\Repository\SavedRandoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedRandoRepository::class)
 */
class SavedRando
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="savedRandos")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=Rando::class)
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $rando_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getRandoId(): ?Rando
    {
        return $this->rando_id;
    }

    public function setRandoId(?Rando $rando_id): self
    {
        $this->rando_id = $rando_id;

        return $this;
    }
}
