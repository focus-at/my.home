<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\Create\NewsCreateController;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 * //attributes={"security"="is_granted('ROLE_USER')"},
 * @ApiResource()
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     *
     *
     */
    private $datetime;

    /**
     * @ORM\Column(type="text")
     *
     *
     */
    private $description;

    /**
     * @ORM\Column(type="smallint")
     *
     *
     */
    private $type = 1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     *
     */
    private $main_image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMainImage(): ?string
    {
        return $this->main_image;
    }

    public function setMainImage(?string $main_image): self
    {
        $this->main_image = $main_image;

        return $this;
    }
}
