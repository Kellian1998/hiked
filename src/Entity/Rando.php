<?php

namespace App\Entity;

use App\Repository\RandoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RandoRepository::class)
 * @Vich\Uploadable
 */
class Rando
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $difficulty;

    /**
     * @ORM\Column(type="integer")
     */
    private $start_lat;

    /**
     * @ORM\Column(type="integer")
     */
    private $start_long;

    /**
     * @ORM\Column(type="integer")
     */
    private $end_lat;

    /**
     * @ORM\Column(type="integer")
     */
    private $end_long;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
    * @Vich\UploadableField(mapping="blog_images", fileNameProperty="photo")
    * @var File
    */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $family;

    /**
     * @ORM\Column(type="boolean")
     */
    private $couple;

    /**
     * @ORM\Column(type="boolean")
     */
    private $solo;

    /**
     * @ORM\Column(type="integer")
     */
    private $longueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $milieu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getStartLat(): ?int
    {
        return $this->start_lat;
    }

    public function setStartLat(int $start_lat): self
    {
        $this->start_lat = $start_lat;

        return $this;
    }

    public function getStartLong(): ?int
    {
        return $this->start_long;
    }

    public function setStartLong(int $start_long): self
    {
        $this->start_long = $start_long;

        return $this;
    }

    public function getEndLat(): ?int
    {
        return $this->end_lat;
    }

    public function setEndLat(int $end_lat): self
    {
        $this->end_lat = $end_lat;

        return $this;
    }

    public function getEndLong(): ?int
    {
        return $this->end_long;
    }

    public function setEndLong(int $end_long): self
    {
        $this->end_long = $end_long;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    // Dans les Getters/setters
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->update_at = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFamily(): ?bool
    {
        return $this->family;
    }

    public function setFamily(bool $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getCouple(): ?bool
    {
        return $this->couple;
    }

    public function setCouple(bool $couple): self
    {
        $this->couple = $couple;

        return $this;
    }

    public function getSolo(): ?bool
    {
        return $this->solo;
    }

    public function setSolo(bool $solo): self
    {
        $this->solo = $solo;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getMilieu(): ?string
    {
        return $this->milieu;
    }

    public function setMilieu(string $milieu): self
    {
        $this->milieu = $milieu;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }
}
