<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersLoginRepository")
 */
class UsersLogin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Log;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLog(): ?string
    {
        return $this->Log;
    }

    public function setLog(string $Log): self
    {
        $this->Log = $Log;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }
}
