<?php

namespace App\Entity;

use App\Repository\FriendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendRepository::class)
 */
class Friend
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $requestStatus;

    /**
     * @ORM\OneToOne(targetEntity=Profile::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $profileSender;

    /**
     * @ORM\OneToOne(targetEntity=Profile::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $profileReceiver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestStatus(): ?int
    {
        return $this->requestStatus;
    }

    public function setRequestStatus(int $requestStatus): self
    {
        $this->requestStatus = $requestStatus;

        return $this;
    }

    public function getProfileSender(): ?profile
    {
        return $this->profileSender;
    }

    public function setProfileSender(profile $profileSender): self
    {
        $this->profileSender = $profileSender;

        return $this;
    }

    public function getProfileReceiver(): ?profile
    {
        return $this->profileReceiver;
    }

    public function setProfileReceiver(profile $profileReceiver): self
    {
        $this->profileReceiver = $profileReceiver;

        return $this;
    }
}
