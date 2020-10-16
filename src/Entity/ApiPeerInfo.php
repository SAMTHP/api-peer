<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApiPeerInfoRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ApiPeerInfoRepository::class)
 * @ApiResource
 */
class ApiPeerInfo
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
    private $nameConversation;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $userA;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $userB;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameConversation(): ?string
    {
        return $this->nameConversation;
    }

    public function setNameConversation(string $nameConversation): self
    {
        $this->nameConversation = $nameConversation;

        return $this;
    }

    public function getUserA(): ?array
    {
        return $this->userA;
    }

    public function setUserA(?array $userA): self
    {
        $this->userA = $userA;

        return $this;
    }

    public function getUserB(): ?array
    {
        return $this->userB;
    }

    public function setUserB(?array $userB): self
    {
        $this->userB = $userB;

        return $this;
    }
}
