<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=ProfileRepository::class)
 */
class Profile
{
    const GENDER_MAN = "MALE";
    const GENDER_WOMAN = "FEMALE";
    const GENDER_NON_BINAIRE = "Non binaire";
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Il vous faut un nom de compte")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="L'email n'est pas valide")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}$", message=" y'a tout là qui n'est pa bon mais après tu peux faire plusieurs regex pour cibler l'erreur" )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\OneToOne(targetEntity=Role::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getRole(): ?role
    {
        return $this->role;
    }

    public function setRole(role $role): self
    {
        $this->role = $role;

        return $this;
    }
}
