<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VotesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VotesRepository::class)
 */
class Votes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Meetings::class, inversedBy="votes")
     */
    private $meeting_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=VoteVars::class, mappedBy="vote_id")
     */
    private $voteVars;

    public function __construct()
    {
        $this->voteVars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeetingId(): ?Meetings
    {
        return $this->meeting_id;
    }

    public function setMeetingId(?Meetings $meeting_id): self
    {
        $this->meeting_id = $meeting_id;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|VoteVars[]
     */
    public function getVoteVars(): Collection
    {
        return $this->voteVars;
    }

    public function addVoteVar(VoteVars $voteVar): self
    {
        if (!$this->voteVars->contains($voteVar)) {
            $this->voteVars[] = $voteVar;
            $voteVar->setVoteId($this);
        }

        return $this;
    }

    public function removeVoteVar(VoteVars $voteVar): self
    {
        if ($this->voteVars->contains($voteVar)) {
            $this->voteVars->removeElement($voteVar);
            // set the owning side to null (unless already changed)
            if ($voteVar->getVoteId() === $this) {
                $voteVar->setVoteId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
