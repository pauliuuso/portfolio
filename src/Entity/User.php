<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="This email is already taken")
 * @UniqueEntity(fields={"username"}, message="This username is already taken")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="bigint", options={"default":0})
     */
    private $exp = 0;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_visit;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $password;

    /**
     * @ORM\Column(type="array", length=50)
     */
    private $roles = ['ROLE_USER'];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return User
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     *
     * @return User
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return int
     */
    public function getExp(): ?int
    {
        return $this->exp;
    }

    /**
     * @param int $exp
     *
     * @return User
     */
    public function setExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastVisit(): ?\DateTimeInterface
    {
        return $this->last_visit;
    }

    /**
     * @param \DateTimeInterface|null $last_visit
     *
     * @return User
     */
    public function setLastVisit(?\DateTimeInterface $last_visit): self
    {
        $this->last_visit = $last_visit;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return User
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

//    public function getRoles()
//    {
//        return [
//            'ROLE_USER'
//        ];
//    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ]);
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ) = unserialize($serialized, ['allowed_classes' => false, ]);
    }
}
