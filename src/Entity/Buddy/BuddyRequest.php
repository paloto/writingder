<?php

namespace App\Entity\Buddy;

use App\Entity\User\User;
use App\Repository\BuddyRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: BuddyRequestRepository::class)]
class BuddyRequest
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'buddyRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'buddyRequestReceived')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $buddy = null;

    #[ORM\Column(length: 16)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBuddy(): ?User
    {
        return $this->buddy;
    }

    public function setBuddy(?User $buddy): self
    {
        $this->buddy = $buddy;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
